//*************************************
//***** Screen elements **********
//*************************************
var opened = true

var loadedPercent = 10
var loadingScreenDiv = window.document.getElementById('loadingScreen')
var loadingScreenDiv = window.document.getElementById('loadingScreen')
var menuDiv = document.getElementsByClassName('menu menu--closed')[0]
var loadingScreenShowTimer = undefined
var canvas = document.getElementById('modelDisplay')
var ccontainer = document.getElementById('sossModels')
var filesize = 5000000

//****************************************************************************************
//*************************** LOADING SCREEN SETTINGS ***********************************
//****************************************************************************************

function MyLoadingScreen() {}

MyLoadingScreen.prototype.displayLoadingUI = function () {
  var bar = document.getElementById('loadingBar')
  var elem = document.getElementById("loadingLabel");
  bar.style.width = 0 + '%'
  //elem.innerHTML = 0 + '%';
}

MyLoadingScreen.prototype.hideLoadingUI = function () {
  loadingScreenDiv.style.opacity = 1
  var loadingScreenHideTimer = window.setInterval(hideLoadingScreen, 50)
  function hideLoadingScreen() {
    if (loadingScreenDiv.style.opacity > 0) {
      loadingScreenDiv.style.opacity -= 0.05
    }
    if (loadingScreenDiv.style.opacity <= 0) {
      clearInterval(loadingScreenHideTimer)
      clearInterval(loadingScreenShowTimer)
      loadingScreenDiv.style.opacity = 0
      loadingScreenDiv.style.display = 'none'
      canvas.width = ccontainer.clientWidth
      canvas.height = ccontainer.clientHeight
      canvas.style.display = 'block'
    }
  }
}

canvas.addEventListener(
  'contextmenu',
  function (evt) {
    evt.preventDefault()
  },
  false,
)

////**************************************************************************
//********************* BABYLON ENGINE INITIALIZATION *****************
////**************************************************************************
var engine = new BABYLON.Engine(canvas, true, {
  premultipliedAlpha: false,
  preserveDrawingBuffer: true,
  stencil: true,
})
var scene = new BABYLON.Scene(engine)
var camera = new BABYLON.ArcRotateCamera(
  'Camera',
  0,
  0,
  0,
  new BABYLON.Vector3(0, 0, 0),
  scene,
)
var photoCamera
var photoCameraB
camera.setTarget(BABYLON.Vector3.Zero())
var skyboxPath = 'public/scene/roomSpecularHDR.dds'
var baseUrl
var asyncMesh
var currentMesh
var shadowGenerator
scene.clearColor = new BABYLON.Color3(1, 1, 1)

//******************************************************
//******************* MODEL REQUEST ********************
//******************************************************

var url = new URL(window.location.href)
console.log(url)
var code = url.searchParams.get('code')
console.log(code)
var material = url.searchParams.get('material')
console.log(material)

//****************************************************************************************
//****************************** CREATE & LOAD SCENE ***********************************
//****************************************************************************************

var createScene = function () {
  //Loading Screen
  var loadingScreen = new MyLoadingScreen()
  engine.loadingScreen = loadingScreen
  engine.displayLoadingUI()

  // Model loader
  BABYLON.GLTFFileLoader.IncrementalLoading = false
  baseUrl = 'public/models/'
  fileName = code + '.glb'

  BABYLON.SceneLoader.ImportMesh(
    '',
    baseUrl,
    fileName,
    scene,
    function (syncMesh) {
      // Camera
      scene.createDefaultCameraOrLight(true, true, true)
      scene.activeCamera.lowerRadiusLimit = 500
      scene.activeCamera.upperRadiusLimit = 2000
      scene.activeCamera.panningSensibility = 10
      scene.activeCamera.wheelPrecision = 0.25
      scene.activeCamera.useAutoRotationBehavior = true // new

      // this runs for 12 seconds then returns false.
      setTimeout(function () {
        scene.activeCamera.useAutoRotationBehavior = false
      }, 12000)

      scene.activeCamera.alpha = Math.PI
      //scene.activeCamera.beta = (7.8 * Math.PI) / 16
      // This new beta value tips the model down slightly so we see the top of the hinge
      // Great source of info: https://doc.babylonjs.com/api/classes/babylon.arcrotatecamera#beta

      scene.activeCamera.beta = 1.3

      photoCamera = scene.activeCamera.clone()
      photoCameraB = photoCamera.clone()
      photoCameraB.alpha = Math.PI / 3 + Math.PI

      // Ground
      var sourcePlane = new BABYLON.Plane(0, 1, 0, 0)
      sourcePlane.normalize()

      for (var i = 1; i < syncMesh.length; i++) {
        //Stop Animations
        scene.beginAnimation(syncMesh[i], 2.6, 2.6, false)

        syncMesh[i].actionManager = new BABYLON.ActionManager(scene)
        syncMesh[i].actionManager.registerAction(
          new BABYLON.ExecuteCodeAction(
            BABYLON.ActionManager.OnPointerOverTrigger,
            function (ev) {},
            false,
          ),
        )

        //More & more bump
        if (syncMesh[i].material && syncMesh[i].material.bumpTexture) {
          syncMesh[i].material.bumpTexture.level = 1.5
        }

        //Textures
        if (i > 0) {
          //Base Color
          setBaseColor(syncMesh[i])

          //Roughness
          syncMesh[i]._material._roughness = 0.2

          //Normal
          if (material == 'sn' || material == 'sc' || material == 'sb') {
            setNormal(syncMesh[i], 'normal_01')
          }
          if (material == 'u') {
            setNormal(syncMesh[i], 'normal_02')
            syncMesh[i]._material._roughness = 0.31
          }
          if (code == 101 && material == 'bec') {
            setNormal(syncMesh[i], 'normal_03')
          }
          if (material == 'orb') {
            setNormal(syncMesh[i], 'normal_04')
            syncMesh[i]._material._roughness = 0.31
          }

          //Metalic and AO
          setAll(syncMesh[i])
        }
      }
      //Env texture
      hdrTexture = new BABYLON.CubeTexture.CreateFromPrefilteredData(
        skyboxPath,
        scene,
      )
      scene.environmentTexture = hdrTexture
      engine.hideLoadingUI()
      currentMesh = syncMesh
      console.log(syncMesh)
    },
    function (evt) {
      //On progress function
      if (evt.lengthComputable) {
        loadedPercent = Math.floor(evt.loaded / evt.total) * 100
        if (evt.loaded == evt.total) loadedPercent = 100
      } else {
        var bar = document.getElementById('myBar')
        //var elem = document.getElementById("loadingLabel");
        loadedPercent = Math.round((evt.loaded / filesize) * 100)
        if (loadedPercent > 100) {
          loadedPercent = 100
        }
        bar.style.width = loadedPercent + '%'
        //elem.innerHTML = Math.round((evt.loaded / filesize) * 100) + '%';

        dlCount = evt.loaded / (1024 * 1024)
        loadedPercent = Math.round((evt.loaded / filesize) * 100)
        if (evt.loaded == filesize) loadedPercent = 100
      }
    },
  )

  return scene
}

// call the createScene function
var scene = createScene()

// run the render loop
engine.runRenderLoop(function () {
  window.addEventListener('resize', function () {
    engine.resize()
  })
  canvas.width = ccontainer.clientWidth
  canvas.height = ccontainer.clientHeight
  scene.render()
})

// set the Base Color
function setBaseColor(mesh) {
  var file = 'public/materials/' + code + '/' + material + '/' + mesh.name
  mesh._material._albedoTexture = new BABYLON.Texture(
    file + '_Base_Color.png',
    scene,
  )
  mesh._material._albedoColor.r = 1
  mesh._material._albedoColor.g = 1
  mesh._material._albedoColor.b = 1
}

// Set the Normal
function setNormal(mesh, folder) {
  var file = 'public/materials/' + code + '/' + folder + '/' + mesh.name
  mesh._material._bumpTexture = new BABYLON.Texture(file + '_Normal.png', scene)
}

// Set the Metallic and AO
function setAll(mesh) {
  var file = 'public/materials/' + code + '/all/' + mesh.name
  //Metallic
  mesh._material._metallicTexture = new BABYLON.Texture(
    file + '_Metallic.png',
    scene,
  )
  //AO
  mesh._material._ambientTexture = new BABYLON.Texture(
    file + '_Mixed_AO.png',
    scene,
  )
  mesh._material._ambientTexture = new BABYLON.Texture(
    file + '_Mixed_AO_A.png',
    scene,
  )
}

function menuPlay() {
  for (var i = 1; i < currentMesh.length; i++) {
    var file = 'public/materials/' + code + '/all/' + currentMesh[i].name
    currentMesh[i]._material._ambientTexture = null
    if (opened) {
      scene.beginAnimation(currentMesh[i], 2.6, 0, false)
      currentMesh[i]._material._ambientTexture = new BABYLON.Texture(
        file + '_Mixed_AO.png',
        scene,
      )
    } else {
      scene.beginAnimation(currentMesh[i], 0, 2.7, false)
      currentMesh[i]._material._ambientTexture = new BABYLON.Texture(
        file + '_Mixed_AO_A.png',
        scene,
      )
    }
  }
  opened = !opened
}

//***********************************************
//********** DROPDOWN BUTTON *******************
//***********************************************
// $(document).ready(function () {
//   var Menu = {
//     tools: $('.tools'),
//   }
// })
