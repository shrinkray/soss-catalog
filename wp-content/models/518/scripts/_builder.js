
//Menu building variables
var canvas = document.getElementById('builderCanvas');

//********************* BABYLON ENGINE INITIALIZATION *****************

var engine = new BABYLON.Engine(canvas, true, { premultipliedAlpha: false, preserveDrawingBuffer: true, stencil: true });
var scene = new BABYLON.Scene(engine);
var hinge;
var baseNormals = [new BABYLON.Texture("", scene), new BABYLON.Texture("", scene), new BABYLON.Texture("", scene), new BABYLON.Texture("", scene), new BABYLON.Texture("", scene), new BABYLON.Texture("", scene)];
var animationGroup;
var skyboxPath = data.Skybox;
//Initial Parameters
var isOpen = true;
var isWoodBlock = true;
var hingeMaterial = "Chrome";

//Root path setup
var root;
if (window.location.hostname != "localhost") {
    root = window.location.href.replace("index.html", "");    
    if (root.includes("#")) {
        root = root.replace("#", "");
    }
}
else {
    root = window.location.origin;;
}
//Background setup
scene.clearColor = new BABYLON.Color3(1, 1, 1); //Background color


 //Prototypes
BABYLON.ArcRotateCamera.prototype.spinTo = function (whichprop, targetval, speed) {
    var ease = new BABYLON.CubicEase();
    ease.setEasingMode(BABYLON.EasingFunction.EASINGMODE_EASEINOUT);
    BABYLON.Animation.CreateAndStartAnimation('at4', this, whichprop, speed, 120, this[whichprop], targetval, 0, ease);
}

//Scene creation
var createScene = function () {

    // Assets loader
   var path = root + data.ModelPath;
   var model = data.Model;  

    //Adding an Arc Rotate Camera
    var camera = new BABYLON.ArcRotateCamera("Camera", (Math.PI * 1.1), (7.5 * Math.PI / 16), 4, new BABYLON.Vector3(0, 0, 0), scene);
    camera.attachControl(canvas, false);
    camera.lowerRadiusLimit = 2.3;
    camera.upperRadiusLimit = 6;
    camera.panningSensibility = 1000;
    camera.wheelPrecision = 100;

    //Adding an hemispheric light
    var light = new BABYLON.HemisphericLight("omni", new BABYLON.Vector3(0, 2, 0), scene);
    light.intensity = 0;

    BABYLON.SceneLoader.ShowLoadingScreen = false;
    BABYLON.SceneLoader.Append(path, model, scene,
        onSuccess = function (meshes) {
            hinge = meshes;
            var preloadedImages = new BABYLON.Texture("", scene);
            for (meshes = 1; hinge.meshes.length > meshes; meshes++) {
                hinge.meshes[meshes].actionManager = new BABYLON.ActionManager(scene); // Pointer behavior on model hover                       
                hinge.meshes[meshes].actionManager.registerAction(new BABYLON.ExecuteCodeAction(BABYLON.ActionManager.OnPointerOverTrigger, function (ev) {
                }, false));

                
                
                //Preloading AO Images
                if (!hinge.meshes[meshes].name.includes("hdrSkyBox")) {
                    preloadedImages << new BABYLON.Texture(`./assets/materials/aoOpen/${hinge.meshes[meshes].name}_AO.png`, scene);
                    preloadedImages << new BABYLON.Texture(`./assets/materials/aoOpen/WB_${hinge.meshes[meshes].name}_AO.png`, scene);
                    preloadedImages << new BABYLON.Texture(`./assets/materials/aoClosed/${hinge.meshes[meshes].name}_AO.png`, scene);
                    preloadedImages << new BABYLON.Texture(`./assets/materials/aoClosed/WB_${hinge.meshes[meshes].name}_AO.png`, scene);

                    if (!hinge.meshes[meshes].name.includes("Wood") && !(hinge.meshes[meshes].name.includes("Background"))) {
                        preloadedImages << new BABYLON.Texture(`./assets/materials/normalMaps/${hinge.meshes[meshes].name}_BlackECoat.png`, scene);
                        //Hinge Normals store for further swap
                        baseNormals[meshes] = hinge.meshes[meshes].material.bumpTexture;
                    }
                    else {
                        preloadedImages << new BABYLON.Texture("", scene);
                        baseNormals[meshes] = new BABYLON.Texture("", scene);
                    }
                }
                
                //Roughness and Metalness adjustments
                if (!hinge.meshes[meshes].name.includes("Wood")) {
                    hinge.meshes[meshes].material.roughness = 0.5;
                    hinge.meshes[meshes].material.metallic = 0.9;
                }
                else {
                    hinge.meshes[meshes].material.roughness = 2;
                    hinge.meshes[meshes].material.metallic = 0;
                }

            }

            //Animation handling
            hinge.animationsEnabled = true;
            animationGroup = hinge.animationGroups[0];
            animationGroup.loopAnimation = false;
            isOpen = true;

            animationGroup.onAnimationGroupPlayObservable.add(function () {
                setTimeout(() => {
                    // Change AO after 4s if the hinge is open. Otherwise 0s
                    for (meshes = 1; hinge.meshes.length > meshes; meshes++) {
                        if (!hinge.meshes[meshes].name.includes("Background") && !hinge.meshes[meshes].name.includes("hdrSkyBox")) {
                            hinge.meshes[meshes].material.ambientTexture =
                                new BABYLON.Texture(`./assets/materials/ao${isOpen ? "Open" : "Closed"}/${isWoodBlock ? "WB_" : ""}${hinge.meshes[meshes].name}_AO.png`, scene);
                            hinge.meshes[meshes].material.ambientTexture.vAng = -Math.PI;
                            hinge.meshes[meshes].material.ambientTexture.wAng = -Math.PI;
                        }
                    }
                }, isOpen ? 4000 : 0);
            });

            animationGroup.onAnimationEndObservable.add(function () {                
                $("#playAnimation").css("background", " #CD3327");
            });            
            //Environemnt
            var hdrTexture = new BABYLON.CubeTexture.CreateFromPrefilteredData(skyboxPath, scene);
            scene.environmentTexture = hdrTexture;
            $("#loadingScreen").fadeOut(4000);

        },
        onProgress = function (evt) {
            //On progress function

            if (evt.lengthComputable) {
                var loadingPercentage = (evt.loaded * 100 / evt.total).toFixed();
                console.log("Loading, please wait..." + loadingPercentage + "%");
                $("#loadingText").text("Loading, please wait..." + loadingPercentage + "%");
                $("#loadingBar").css("width", `${loadingPercentage}%`);
               
                if (loadingPercentage >= 100) { }          
                    
            }
            else {

                dlCount = evt.loaded / (1024 * 1024);
                console.log("Loading, please wait..." + Math.floor(dlCount * 100.0) / 100.0 + " MB already loaded.");

            }
        }
    );
    window.addEventListener("resize", function () { engine.resize(); });
    return scene;
}


// call the createScene function
var scene = createScene();

// run the render loop
engine.runRenderLoop(function () {
    window.addEventListener("resize", function () { engine.resize(); });
    scene.render();
});


function playAnimation() {
    if (!animationGroup.isPlaying) {
        $("#playAnimation").css("background", "#DFDFDF");
        if (isOpen) {
            //Play Animation Forward
            animationGroup.start(false, -1, 4, 0);            
        }
        else {
            //Play Animation Backwards
            animationGroup.start(false, 1, 0, 4);
        }
        isOpen = !isOpen;
    }    
}



function woodBlockState() {
    isWoodBlock = !isWoodBlock;
    for (meshes = 1; hinge.meshes.length > meshes; meshes++) {
        if (!hinge.meshes[meshes].name.includes("Background") && !hinge.meshes[meshes].name.includes("hdrSkyBox")) {
            //Toggle the wood block visibility
            if (hinge.meshes[meshes].name.includes("Wood"))
                hinge.meshes[meshes].visibility = !hinge.meshes[meshes].visibility;  

            //Setting corresponging AO.
            hinge.meshes[meshes].material.ambientTexture =
                new BABYLON.Texture(`./assets/materials/ao${isOpen ? "Open" : "Closed"}/${isWoodBlock ? "WB_" : ""}${hinge.meshes[meshes].name}_AO.png`, scene);
            hinge.meshes[meshes].material.ambientTexture.vAng = -Math.PI;
            hinge.meshes[meshes].material.ambientTexture.wAng = -Math.PI;
        }


        $("#woodState").text(`${isWoodBlock ? "Show" : "Hide"} Wood Blocks`);
        $("#woodImage").attr("src", `./assets/layout/${isWoodBlock ? "show" : "hide"}.png`);

    }
        
    if (isWoodBlock && isOpen) {
        scene.activeCamera.spinTo("alpha", (Math.PI * 1.1), 60);
        scene.activeCamera.spinTo("beta", (7.5 * Math.PI / 16), 60);
        scene.activeCamera.spinTo("radius", 4, 60);
    }

    
            
}

function materialChange(material) {
    var colorCode;
    //Change title & code
    switch (material) {
        case "chrome":
            colorCode = "#C7C7C7";
            document.title = "SOSS - 518US26D";
            break;
        case "brass":
            colorCode = "#D2BB74";
            document.title = "SOSS - 518US4";
            break;
        case "black":
            colorCode = "#181818";
            document.title = "SOSS - 518US19";
            break;
        case "nickel":
            colorCode = "#D3CBBE";
            document.title = "SOSS - 518US15";
            break;
    }

    if (material != hingeMaterial) {
        $(`#${material}`).detach().prependTo("#materialChange");
        $(`#${material}`).css("display", "inline-block");
        
        for (meshes = 1; hinge.meshes.length > meshes; meshes++) {
            
            if (!hinge.meshes[meshes].name.includes("Wood") && !(hinge.meshes[meshes].name.includes("Background")) && !hinge.meshes[meshes].name.includes("hdrSkyBox")) {                 
                hinge.meshes[meshes].material.bumpTexture = baseNormals[meshes];
                hinge.meshes[meshes].material.albedoColor = new BABYLON.Color3.FromHexString(colorCode);
                if (material != "black") {                   
                    hinge.meshes[meshes].material.albedoColor.b -= 50 / 255;
                    hinge.meshes[meshes].material.albedoColor.g -= 50 / 255;
                    hinge.meshes[meshes].material.albedoColor.r -= 50 / 255;
                }
                else {
                    hinge.meshes[meshes].material.bumpTexture = new BABYLON.Texture(`./assets/materials/normalMaps/${hinge.meshes[meshes].name}_BlackECoat.png`, scene);
                    hinge.meshes[meshes].material.bumpTexture.vAng = -Math.PI;
                    hinge.meshes[meshes].material.bumpTexture.wAng = -Math.PI;
                }
            }
        }
        hingeMaterial = material;
    }

   
}
