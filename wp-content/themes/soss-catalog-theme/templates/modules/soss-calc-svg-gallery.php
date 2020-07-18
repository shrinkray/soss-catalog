<?php
/**
 *
 * SVG Gallery
 *
 * svg images with embedded JS for button animation and how-to animation
 * by Greg Miller 5/13/2019
 *
 * GSAP dependencies
 */
?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>


  <!--  WEIGHT SVG  -->
  <div class="weightSvg weight hideSvg">

    <svg id="weightSvg" width="300px" height="300px" viewBox="0 0 300 300" xml:space="preserve"
         xmlns="http://www.w3.org/2000/svg">
            <g id="Scale">
              <path id="container"
                    d="M202.24 289.69l-107-.609v-19.516l13.472-22.365s1.945-5.604 8.444-6.119c10.067-.8 55.785-.106 61.667-.106s8.334 5.529 8.334 5.529l15.083 22.741v20.445z"
                    clip-rule="evenodd" fill="#A8A8A8" fill-rule="evenodd" stroke="#000" stroke-miterlimit="10"/>
              <path id="sc_top"
                    d="M103.98 266.21l11.27-17.811s1.626-4.463 7.064-4.873c8.421-.638 46.667-.086 51.587-.086 4.921 0 6.972 4.404 6.972 4.404l12.617 18.11"
                    clip-rule="evenodd" fill="#878787" fill-rule="evenodd" stroke="#777" stroke-miterlimit="10"
                    stroke-width=".5669"/>
              <path id="sc_front"
                    d="M202.24 270.6c0-.45-.363-1.158-.813-1.158H95.717c-.449 0-.479.708-.479 1.158v18.075c0 .449.031.767.479.767h105.71c.45 0 .813-.317.813-.767V270.6z"
                    clip-rule="evenodd" fill="#EDEDED" fill-rule="evenodd" stroke="#000" stroke-linecap="round"
                    stroke-linejoin="round" stroke-miterlimit="10"/>
              <ellipse id="sc_button" cx="192.21" cy="279.14" rx="3.372" ry="3.485" clip-rule="evenodd" fill="#939393"
                       fill-rule="evenodd" stroke="#fff" stroke-miterlimit="10"/>
              <path id="sc_face" clip-rule="evenodd" fill="#3F0505" fill-rule="evenodd" d="M104.74 269.94h77v17h-77z"/>
              <path id="screen_frez" clip-rule="evenodd" fill="#fff" fill-rule="evenodd"
                    d="M104.74 270.05l-.08 16.89h77.1l-.02-17h-.55l.06 16.52H105.4l-.06-16.41z"/>
              <text transform="matrix(1 0 0 1 116 283.7)" fill="#FFFFFF" font-family="'Orbitron'" opacity="0"
                    class="count" font-size="12">100</text>
              <text transform="translate(145 283.7)" fill="#FFF" font-family="'Orbitron'" font-size="12">LBS</text>
            </g>
      <g id="door_group" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
        <path id="iso_door" fill="#CFCFCF"
              d="M109.89 6.867l4.79-.759 86.18 19.471.06 213.361-4.34 1.12-86.33-19.89z"/>
        <path id="face_edge" fill="#666" stroke-width=".2551" d="M196.68 26.75l4.09-1.177.18 212.887-4.27 1.05z"/>
        <path id="top_edge" fill="#666" stroke-width=".2551"
              d="M196.6 26.592l-86.57-19.69 4.35-1.028 86.1 19.574z"/>
      </g>
      <g id="arrow_group">
        <path id="arrow" fill="red"
              d="M146.85 224.66l18.16-13.22-8.73-1.93-.27-12.56-19.8-4.69.27 12.52-8.32-2.03z"/>
      </g>
      <g id="ultralatch" fill="#EFEFEF" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
         stroke-miterlimit="10" stroke-width=".2835">
        <path id="handle"
              d="M186.39 123.91s1.24-.16 1.61-1.22.39-2.8-.68-2.98c-.92-.15-9.47-1.52-10.8-1.67-1.11-.13-1.8-.16-2.31.25s-1.48 2.07.61 2.79c-.12-.07.99 1.02 2.09 3.23s1.51 2.94 2.23 4.19 1.73 2.6 2.33 3.27c.74.82.8 2.04.55 4.24-.12 1.12-.46 1.97-.22 3.11.24 1.13.8 1.57 1.38 1.94.57.37 1.38 1.38 2.39 1.68s1.58.21 1.58.21-.11 1.92.41 2.23 1.33.15 1.33.15-1.09-2.27-1.07-2.52c.03-.24.95-.26 1.59-.99s1.27-1.45 1.49-3.4c.22-1.94-.19-3.22-.62-3.76s-1.04-2.83-1.1-3.81c-.26-.38-2.89-1.16-2.89-1.16s-.55-1.84-.45-3.25c.1-1.4.55-2.53.55-2.53z"/>
        <path id="interior" d="M188.49 130.8s-.66.03-.95.26c-.27.21-.49.57-.53.62"/>
        <path id="bottom"
              d="M188.23 138.14c-.13 1.89-.72 2.53-1.55 3.06s-3.3-.23-3.3-.23 1.29 1.66 3.39 1.55 3.28-2.12 3.57-3.44"/>
        <path d="M187.78 140.99s-.32 1.01-.07 1.33"/>
        <path
            d="M185.32 124.47s-.49 3.88-.35 5.11c.14 1.22.3 1.76 1.01 2.93.96 1.54.51 3.06.46 3.67s-.05 2.46-.67 3.24c-.61.77-1.42 1.43-2.72 1.08"/>
        <path d="M175.69 121.36l8.67 1.88"/>
        <path d="M185.87 123.77c-.55-.38-.88-1.22-.77-2.16.08-.75.43-1.37.88-1.72"/>
        <path d="M200.1 138.89l.04 2.45-2.21 2.1-.01-12.59 2.19-1.41-.05 4.67"/>
        <path d="M199.38 134.1s-.52.05-.71.56c-.2.57-.14 3.79.01 4.04l.2-.04"/>
        <path
            d="M199.34 134.27s1.4.13 1.79.2.37.57.39.73c.02.15-.03 3.33-.03 3.33s-.11.28-.73.26c-.46-.02-1.99-.26-1.99-.26"/>
        <path d="M199.13 135.22l1.03.06s1.07.08 1.18-.22"/>
      </g>

      <script type="text/javascript"><![CDATA[

        // Weight SVG
        let tl4 = new TimelineMax({pause: true, repeatDelay: 1});

        // Speed of door dropping onto scale
        tl4.fromTo( "#weightSvg", 1, { opacity: 0 }, {opacity: 1, ease: Power1.easeIn } )

            .to( "#door_group, #ultralatch, #arrow", 2.0, {y: "25px", ease: Power1.easeOut, delay: 1.0 } )

            // disolves in scale counter
            .to(".count", 1, {opacity:1, delay: 0}, "-=1");

        tl4.play();

        // Button event actions for hotspot. While hovering button, remove hide class

        let weightButton = document.querySelector( '.weightBtn'),
            weightSvg = document.querySelector( `.weightSvg`),
            galleryMsg1 = document.querySelector(`.gallery-message`);

        weightButton.addEventListener( "mouseover", function () {

          galleryMsg1.classList.add( `hideSvg` );
          weightSvg.classList.remove( 'hideSvg' );
          tl4.restart();

        });

        weightButton.addEventListener( "mouseout", function () {

          tl4.pause();
          galleryMsg1.classList.remove( `hideSvg` );
          weightSvg.classList.add( 'hideSvg');


        });


        ]]>

      </script>
  </svg>

  </div> <!-- WEIGHT SVG -->



    <!--  HEIGHT SVG  -->
    <div class="heightSvg height hideSvg">

      <svg id="heightSvg" width="300px" height="300px" viewBox="0 0 300 300" xml:space="preserve"
           xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <!--  Not Needed  -->
                </defs>

        <g id="measures">


          <!-- DOOR	 -->

          <g id="door">
            <polygon id="door" fill="#CFCFCF" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                     stroke-miterlimit="10" points="
		114.894,18.867 119.678,18.108 205.864,37.579 205.915,260.942 201.579,262.057 115.246,242.168 	"/>

            <polygon id="edge" fill="#666666" stroke="#000000" stroke-width="0.2551" stroke-linecap="round"
                     stroke-linejoin="round" stroke-miterlimit="10" points="
		201.682,38.75 205.771,37.573 205.948,260.466 201.682,261.513 	"/>

            <polygon id="top" fill="#666666" stroke="#000000" stroke-width="0.2551" stroke-linecap="round"
                     stroke-linejoin="round" stroke-miterlimit="10" points="
		201.598,38.592 115.032,18.902 119.379,17.874 205.481,37.448 	"/>
          </g>

          <!--  RULER    -->

          <g id="ruler">
            <rect id="ruler_back" x="89" y="21" fill="#FFF" width="19" height="218"/>
            <rect id="v_height" x="89" y="21" fill="#FF0000" width="19" height="218"/>
            <path id="theRuler" fill="#020202" d="M88.196,240.02l0.042-219.695l21.595-0.125l0.06,219.97L88.196,240.02z M90.032,238.631
		l18.018-0.097l0.026-3.091l-5.574,0.128v-1.655l5.589-0.129l0.025-3.091l-1.862,0.049v-1.658l1.875-0.05l0.026-3.091l-1.901,0.051
		v-1.654l1.897-0.053v-3.094v-0.053l-1.897,0.053v-1.656l1.897-0.053v-3.091l-1.897,0.053v-1.656l1.897-0.053v-3.094l-4.745,0.133
		v-1.656l4.745-0.13v-3.094l-1.897,0.05v-1.656l1.897-0.049v-3.092l-1.897,0.05v-1.655l1.897-0.049v-3.093l-4.745,0.13v-1.656
		l4.745-0.132v-3.092l-1.897,0.052v-1.656l1.897-0.051v-3.094l-1.897,0.052v-1.657l1.897-0.049v-3.094l-4.745,0.127v-1.653
		l4.745-0.132v-3.092l-1.897,0.053v-1.656l1.897-0.055v-3.09l-1.897,0.051v-1.654l1.897-0.053v-3.092l-4.745,0.129v-1.655
		l4.745-0.13v-3.091l-1.897,0.049v-1.658l1.897-0.049v-3.092l-1.897,0.052v-1.656l1.897-0.051v-3.094l0,0l-1.897,0.053v-1.656
		l1.897-0.053v-3.09l-1.897,0.053v-1.656l1.897-0.053v-3.094l-4.745,0.133v-1.657l4.745-0.13v-3.094l-1.897,0.051v-1.656l1.897-0.05
		v-3.091l-1.897,0.05v-1.657l1.897-0.048v-3.094l-4.745,0.13v-1.656l4.745-0.131v-3.091l-1.897,0.05v-1.656l1.897-0.052v-3.093
		l-1.897,0.052v-1.656l1.897-0.051v-3.093l-4.745,0.128v-1.655l4.745-0.13v-3.094l-1.897,0.053v-1.656l1.897-0.054v-3.091
		l-1.897,0.051v-1.654l1.897-0.054v-3.09l-4.745,0.128v-1.656l4.745-0.13v-3.091l-1.897,0.05V96.08l1.897-0.049v-3.091l-1.897,0.05
		v-1.655l1.897-0.053v-3.094v0.042l-1.897,0.054v-1.658l1.897-0.052v-3.091l-1.897,0.053v-1.656l1.897-0.054v-3.093l-4.745,0.133
		v-1.656l4.745-0.131v-3.093l-1.897,0.051v-1.656l1.897-0.05v-3.091l-1.897,0.05v-1.657l1.897-0.049v-3.093l-4.745,0.13v-1.656
		l4.745-0.131v-3.091l-1.897,0.051V58.14l1.897-0.052v-3.093l-1.897,0.052v-1.656l1.897-0.051v-3.094l-4.745,0.128V48.72l4.745-0.13
		v-3.093l-1.897,0.053v-1.657l1.897-0.053v-3.09l-1.897,0.05v-1.654l1.897-0.053v-3.091l-4.745,0.128v-1.656l4.745-0.13v-3.091
		l-1.897,0.05v-1.659l1.897-0.049v-3.092l-1.897,0.051v-1.655l1.897-0.052v-3.094l-18.127,0.18l-0.02,216.698H90.032z"/>

          </g>
        </g>l

        <!--  ULTRALATCH    -->

        <g id="ultralatch">

          <path id="handle" fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
		M191.392,145.91c0,0,1.243-0.157,1.607-1.221c0.367-1.065,0.391-2.8-0.681-2.975c-0.922-0.151-9.469-1.523-10.804-1.674
		c-1.106-0.126-1.796-0.16-2.307,0.247c-0.512,0.407-1.476,2.065,0.608,2.788c-0.119-0.066,0.986,1.019,2.087,3.233
		c1.1,2.212,1.51,2.936,2.228,4.185c0.718,1.25,1.729,2.605,2.332,3.275c0.737,0.818,0.802,2.044,0.551,4.244
		c-0.125,1.118-0.457,1.973-0.217,3.106c0.239,1.133,0.805,1.565,1.376,1.938c0.574,0.371,1.38,1.385,2.391,1.684
		c1.01,0.299,1.582,0.213,1.582,0.213s-0.105,1.921,0.414,2.225c0.519,0.307,1.334,0.152,1.334,0.152s-1.093-2.273-1.065-2.517
		c0.027-0.242,0.95-0.261,1.586-0.987c0.637-0.727,1.271-1.453,1.491-3.395c0.221-1.941-0.187-3.217-0.617-3.757
		s-1.044-2.826-1.103-3.812c-0.264-0.381-2.887-1.156-2.887-1.156s-0.549-1.845-0.454-3.253
		C190.938,147.045,191.392,145.91,191.392,145.91z"/>

          <path id="interior" fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
		M193.489,152.801c0,0-0.662,0.033-0.945,0.26c-0.266,0.211-0.49,0.566-0.525,0.625"/>

          <path id="bottom" fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
		M193.227,160.139c-0.13,1.889-0.721,2.531-1.553,3.064c-0.83,0.532-3.3-0.23-3.3-0.23s1.293,1.664,3.392,1.555
		c2.096-0.111,3.277-2.123,3.57-3.439"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
		M192.777,162.993c0,0-0.32,1.011-0.067,1.329"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
		M190.315,146.469c0,0-0.489,3.884-0.352,5.105c0.14,1.221,0.296,1.756,1.006,2.935c0.956,1.542,0.507,3.058,0.463,3.667
		c-0.046,0.61-0.051,2.465-0.67,3.238c-0.614,0.768-1.417,1.432-2.721,1.081"/>

          <line fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" x1="180.687" y1="143.362" x2="189.357"
                y2="145.238"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
		M190.872,145.772c-0.552-0.376-0.88-1.221-0.773-2.155c0.084-0.747,0.428-1.375,0.881-1.722"/>

          <polyline fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                    stroke-linejoin="round" stroke-miterlimit="10" points="
		205.103,161.886 205.145,164.34 202.967,165.55 202.957,152.951 205.106,152.442 205.062,157.108 	"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
		M204.405,156.582c0,0-0.522,0.047-0.707,0.563c-0.202,0.567-0.138,3.785,0.015,4.044l0.195-0.041"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
		M204.36,156.748c0,0,1.4,0.133,1.794,0.202s0.366,0.573,0.388,0.728c0.021,0.152-0.032,3.329-0.032,3.329s-0.112,0.284-0.726,0.256
		c-0.461-0.021-1.991-0.26-1.991-0.26"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
		M204.153,157.697l1.034,0.065c0,0,1.073,0.085,1.181-0.219"/>
        </g>

        <script type="text/javascript"><![CDATA[

          let tl1 = new TimelineMax({repeatDelay: 1}),
              v_mark = '#v_height';



          tl1.fromTo( "#heightSvg", 1, { opacity:0 }, {opacity: 1} )
              .from( v_mark, 3, { scaleY: 0, ease: Sine.easeInOut } );


          tl1.play();


          // Button event actions for hotspot. While hovering button, remove hide class

          let heightButton = document.querySelector('.heightBtn'),
              heightSvg = document.querySelector(`.heightSvg`);
              galleryMsg2 = document.querySelector(`.gallery-message`);

          heightButton.addEventListener("mouseover", function () {

            heightSvg.classList.remove('hideSvg');
            galleryMsg2.classList.add('hideSvg');
            tl1.restart();

          });

          heightButton.addEventListener("mouseout", function () {

            heightSvg.classList.add('hideSvg');
            galleryMsg2.classList.remove('hideSvg');
            tl1.pause();

          });

          ]]>

        </script>


          </svg>

    </div> <!-- HEIGHT SVG -->




    <!--  WIDTH SVG  -->
    <div class="widthSvg width hideSvg">

      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300"  xml:space="preserve">

    <defs>
      <mask id="Mask">
        <rect x="0" y="35" width="100" height="60" fill="fff" />
      </mask>
      <clipPath id="myClipPath" >
        <rect x="0" y="35" width="200" height="60" fill="fff" >
          <animate attributeType = "XML"
                   attributeName="x"
                   from="-100" to="106"
                   dur="4s"
                   repeatCount="indefinite" />
        </rect>
      </clipPath>
    </defs>

        <!-- DOOR  -->

        <g id="door">

          <polygon id="isodoor" fill="#CFCFCF" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
		114.894,18.867 119.678,18.108 205.864,37.579 205.915,260.942 201.579,262.057 115.246,242.168"/>

          <polygon id="edge" fill="#666666" stroke="#000000" stroke-width="0.2551" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
		201.682,38.75 205.771,37.573 205.948,260.466 201.682,261.513"/>

          <polygon id="top" fill="#666666" stroke="#000000" stroke-width="0.2551" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
		201.598,38.592 115.032,18.902 119.379,17.874 205.481,37.448"/>
        </g>


        <!--  RULER    -->

        <g id="ruler">
          <polygon id="bottom_mark" fill="#FFF" points="116,53.43 116,71.9 200,91.86 200,71.9 	"/>
          <polygon id="mark" clip-path="url(#myClipPath)" fill="#FF0000" points="116,53.43 116,71.9 200,91.86 200,71.9 	"/>

          <path id="theRuler" d="M114.91,72.96l86.79,20.22l0.01-21.65L114.93,51.6L114.91,72.96z M116.69,71.83l0.03-18.15l2.57,0.54
		l0.05,1.86l1.64,0.39l-0.05-1.86l3.07,0.73l0.04,1.86l1.65,0.39l-0.05-1.86l3.07,0.73l0.12,4.73l1.64,0.39l-0.12-4.73l2.95,0.62
		l0.05,1.79l1.64,0.39l-0.07-1.8l3.1,0.67l0.04,1.86l1.65,0.39l-0.05-1.86l3.07,0.73l0.12,4.73l1.65,0.39l-0.12-4.73l3.07,0.73
		l0.05,1.87l1.64,0.39l-0.05-1.86l3.07,0.73l0.05,1.86l1.65,0.39l-0.05-1.86l3.07,0.73l0.12,4.73l1.64,0.39l-0.12-4.73l3.07,0.73
		l0.05,1.87l1.64,0.39l-0.05-1.86l3.07,0.72l0.05,1.87l1.64,0.39L168,65.62l3.07,0.73l0.12,4.73l1.65,0.39l-0.12-4.73l3.07,0.73
		l0.05,1.87l1.64,0.39l-0.05-1.86l3.07,0.73l0.05,1.87l1.64,0.39l-0.04-1.86l3.07,0.73l0.12,4.73l1.64,0.39l-0.12-4.73l3.08,0.73
		l0.05,1.87l1.64,0.39l-0.05-1.87l3.07,0.73l0.05,1.86l1.65,0.39l-0.05-1.86l3.68,0.84l-0.03,17.76L116.69,71.83z"/>

        </g>


        <!--  ULTRALATCH    -->

        <g id="ultralatch">

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
		M191.392,145.91c0,0,1.243-0.157,1.607-1.221c0.367-1.065,0.391-2.8-0.681-2.975c-0.922-0.151-9.469-1.523-10.804-1.674
		c-1.106-0.126-1.796-0.16-2.307,0.247c-0.512,0.407-1.476,2.065,0.608,2.788c-0.119-0.066,0.986,1.019,2.087,3.233
		c1.1,2.212,1.51,2.936,2.228,4.185c0.718,1.25,1.729,2.605,2.332,3.275c0.737,0.818,0.802,2.044,0.551,4.244
		c-0.125,1.118-0.457,1.973-0.217,3.106c0.239,1.133,0.805,1.565,1.376,1.938c0.574,0.371,1.38,1.385,2.391,1.684
		c1.01,0.299,1.582,0.213,1.582,0.213s-0.105,1.921,0.414,2.225c0.519,0.307,1.334,0.152,1.334,0.152s-1.093-2.273-1.065-2.517
		c0.027-0.242,0.95-0.261,1.586-0.987c0.637-0.727,1.271-1.453,1.491-3.395c0.221-1.941-0.187-3.217-0.617-3.757
		s-1.044-2.826-1.103-3.812c-0.264-0.381-2.887-1.156-2.887-1.156s-0.549-1.845-0.454-3.253
		C190.938,147.045,191.392,145.91,191.392,145.91z"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
		M193.489,152.801c0,0-0.662,0.033-0.945,0.26c-0.266,0.211-0.49,0.566-0.525,0.625"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
		M193.227,160.139c-0.13,1.889-0.721,2.531-1.553,3.064c-0.83,0.532-3.3-0.23-3.3-0.23s1.293,1.664,3.392,1.555
		c2.096-0.111,3.277-2.123,3.57-3.439"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
		M192.777,162.993c0,0-0.32,1.011-0.067,1.329"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
		M190.315,146.469c0,0-0.489,3.884-0.352,5.105c0.14,1.221,0.296,1.756,1.006,2.935c0.956,1.542,0.507,3.058,0.463,3.667
		c-0.046,0.61-0.051,2.465-0.67,3.238c-0.614,0.768-1.417,1.432-2.721,1.081"/>

          <line fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="180.687" y1="143.362" x2="189.357" y2="145.238"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
		M190.872,145.772c-0.552-0.376-0.88-1.221-0.773-2.155c0.084-0.747,0.428-1.375,0.881-1.722"/>

          <polyline fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
		205.103,161.886 205.145,164.34 202.967,165.55 202.957,152.951 205.106,152.442 205.062,157.108 	"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
		M204.405,156.582c0,0-0.522,0.047-0.707,0.563c-0.202,0.567-0.138,3.785,0.015,4.044l0.195-0.041"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
		M204.36,156.748c0,0,1.4,0.133,1.794,0.202s0.366,0.573,0.388,0.728c0.021,0.152-0.032,3.329-0.032,3.329s-0.112,0.284-0.726,0.256
		c-0.461-0.021-1.991-0.26-1.991-0.26"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
		M204.153,157.697l1.034,0.065c0,0,1.073,0.085,1.181-0.219"/>
          <ellipse fill="#9B9B9B" cx="203.981" cy="154.525" rx="0.379" ry="0.92"/>
          <ellipse fill="#9B9B9B" cx="204.361" cy="261.513" rx="0.379" ry="0.92"/>
        </g>


        <script type="text/javascript"><![CDATA[

          // The easeInOut makes it soften the return in both directions.
          let tl0 = new TimelineMax();


          tl0.fromTo( "#widthSvg", 1, { opacity: 0 }, { opacity: 1, ease: Sine.easeIn } )
              .restart();




          let widthButton = document.querySelector('.widthBtn'),
              widthSvg = document.querySelector(`.widthSvg`),
              galleryMsg3 = document.querySelector('.gallery-message');

          widthButton.addEventListener("mouseover", function () {

           // tl0.fromTo( galleryMsg3, 0.5, { opacity: 1 }, { opacity: 0, ease: Sine.easeOut } );

            widthSvg.classList.remove('hideSvg');
           galleryMsg3.classList.add('hideSvg');
            tl0.restart();

          });

          widthButton.addEventListener("mouseout", function () {

            tl0.fromTo( "#widthSvg", 1, { opacity: 1 }, { opacity: 0, ease: Sine.easeOut } );
            //    .to( galleryMsg3, 0.5, { opacity: 1, ease: Sine.easeIn });

            widthSvg.classList.add('hideSvg');
            galleryMsg3.classList.remove('hideSvg');

          });


          ]]>

        </script>


</svg>

    </div> <!-- WIDTH SVG -->




    <!--  THICKNESS SVG  -->
    <div class="thickSvg depth hideSvg">

      <svg id="thickSvg" width="300px" height="300px" viewBox="0 0 300 300" xml:space="preserve"
           xmlns="http://www.w3.org/2000/svg">

    <defs>
      <!--  For area between arrows   -->
      <clipPath id="myClipPath">
        <rect x="180" y="100" width="20" height="30" fill="fff">
          <animate attributeType="XML" attributeName="x" from="180" to="200" dur="2s" repeatCount="10"/>
        </rect>
      </clipPath>
      <!--  For anything in the zoom circle  -->
      <mask id="svg-mask" >
        <circle id="svg-mask-img" cx="225.46" cy="229.36" r="50" fill="#FFF"/>
      </mask>
      <!-- For the Zoom Out area of the door edge -->
      <mask id="sect-mask">
        <rect id="sect-mask-rect" x="190" y="210" width="20" height="30" fill="fff"></rect>
      </mask>

    </defs>

        <!-- Shapes -->
        <!--  INITIAL DOOR  -->
        <polygon id="isodoor" fill="#CFCFCF" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                 stroke-miterlimit="10"
                 points="114.894,17.867 119.678,17.108 205.864,36.579 205.915,259.942 201.579,261.057 115.246,241.168"/>

        <polygon id="door_top" fill="#666666" stroke="#000000" stroke-width="0.2551" stroke-linecap="round"
                 stroke-linejoin="round" stroke-miterlimit="10" points="
            201.598,37.592 115.032,17.902 119.379,16.874 205.481,36.448"/>


        <!--   EDGE   -->

        <polygon id="d_arrow" fill="#FF0000" points="206.49,88.33 220.12,101.83 220.22,94.05 231.83,91.19 232.01,72.81
            220.3,75.78 220.27,67.94"/>

        <polygon id="d_arrow2" fill="#FF0000" points="201.24,88.68 185.92,75.35 185.99,83.44 174.97,86.21 174.85,104.61
            185.82,101.83 185.72,109.58"/>


        <polygon id="face_edge" fill="#666666" stroke="#000000" stroke-width="0.2551" stroke-linecap="round"
                 stroke-linejoin="round" stroke-miterlimit="10" points="
            201.682,37.75 205.771,36.573 205.948,259.466 201.682,260.513"/>


        <g id="firstRuler">
          <polygon id="ruler_bkg" fill="#FFFFFF"
                   points="163.86,115.93 164.25,136.79 235.33,121.97 235.53,100.72 	"/>

          <polygon id="ruler_mark" fill="#FF0000"
                   points="206.37,108.64 201.69,109.58 201.46,127.6 206.49,126.46 	"/>

          <path id="ruler_edge" d="M235.53,100.72l-73.04,15.41l0.12,21.72l72.72-15.89L235.53,100.72z M164.16,135.54l-0.2-17.84l3.69-0.62
                l-0.03,1.85l1.65-0.36l0.03-1.86l3.08-0.68l-0.03,1.86l1.65-0.36l0.03-1.86l3.08-0.67l-0.08,4.71l1.65-0.36l0.08-4.71l3.08-0.68
                l-0.03,1.86l1.65-0.36l0.03-1.86l3.08-0.67l-0.03,1.86l1.65-0.36l0.03-1.86l3.08-0.68l-0.08,4.71l1.65-0.36l0.08-4.71l3.08-0.68
                l-0.03,1.86l1.65-0.36l0.03-1.86l3.08-0.67l-0.03,1.85l1.65-0.36l0.03-1.86l3.08-0.67l-0.08,4.71l1.65-0.36l0.08-4.71l3.08-0.67
                l-0.03,1.85l1.65-0.36l0.03-1.85l3.08-0.68l-0.03,1.86l1.65-0.36l0.03-1.86l3.08-0.68l-0.08,4.71l1.65-0.36l0.08-4.71l3.08-0.67
                l-0.03,1.86l1.65-0.36l0.03-1.85l3.08-0.68l-0.03,1.86l1.65-0.36l0.03-1.86l3.08-0.68l0.03,18.16L164.16,135.54z"/>
        </g>


        <!-- ULTRALATCH HANDLE  -->

        <g id="ultralatch">

          <path id="handle" fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
            M191.39,145.91c0,0,1.24-0.16,1.61-1.22c0.37-1.06,0.39-2.8-0.68-2.98c-0.92-0.15-9.47-1.52-10.8-1.67
            c-1.11-0.13-1.8-0.16-2.31,0.25c-0.51,0.41-1.48,2.07,0.61,2.79c-0.12-0.07,0.99,1.02,2.09,3.23c1.1,2.21,1.51,2.94,2.23,4.19
            c0.72,1.25,1.73,2.6,2.33,3.27c0.74,0.82,0.8,2.04,0.55,4.24c-0.12,1.12-0.46,1.97-0.22,3.11c0.24,1.13,0.8,1.57,1.38,1.94
            c0.57,0.37,1.38,1.38,2.39,1.68c1.01,0.3,1.58,0.21,1.58,0.21s-0.11,1.92,0.41,2.22c0.52,0.31,1.33,0.15,1.33,0.15
            s-1.09-2.27-1.07-2.52c0.03-0.24,0.95-0.26,1.59-0.99c0.64-0.73,1.27-1.45,1.49-3.39c0.22-1.94-0.19-3.22-0.62-3.76
            s-1.04-2.83-1.1-3.81c-0.26-0.38-2.89-1.16-2.89-1.16s-0.55-1.84-0.45-3.25C190.94,147.04,191.39,145.91,191.39,145.91z"/>

          <path id="interior" fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
            M193.49,152.8c0,0-0.66,0.03-0.95,0.26c-0.27,0.21-0.49,0.57-0.53,0.62"/>

          <path id="bottom" fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="
            M193.23,160.14c-0.13,1.89-0.72,2.53-1.55,3.06c-0.83,0.53-3.3-0.23-3.3-0.23s1.29,1.66,3.39,1.55c2.1-0.11,3.28-2.12,3.57-3.44"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round"
                stroke-miterlimit="10" d="
            M192.78,162.99c0,0-0.32,1.01-0.07,1.33"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round"
                stroke-miterlimit="10" d="
            M190.32,146.47c0,0-0.49,3.88-0.35,5.11c0.14,1.22,0.3,1.76,1.01,2.93c0.96,1.54,0.51,3.06,0.46,3.67
            c-0.05,0.61-0.05,2.46-0.67,3.24c-0.61,0.77-1.42,1.43-2.72,1.08"/>

          <line fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round"
                stroke-miterlimit="10" x1="180.69" y1="143.36" x2="189.36" y2="145.24"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round"
                stroke-miterlimit="10" d="
            M190.87,145.77c-0.55-0.38-0.88-1.22-0.77-2.16c0.08-0.75,0.43-1.37,0.88-1.72"/>

          <polyline fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round"
                    stroke-linejoin="round" stroke-miterlimit="10" points="
            205.1,161.89 205.14,164.34 202.97,165.55 202.96,152.95 205.11,152.44 205.06,157.11 	"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round"
                stroke-miterlimit="10" d="
            M204.41,156.58c0,0-0.52,0.05-0.71,0.56c-0.2,0.57-0.14,3.79,0.01,4.04l0.2-0.04"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round"
                stroke-miterlimit="10" d="
            M204.36,156.75c0,0,1.4,0.13,1.79,0.2s0.37,0.57,0.39,0.73c0.02,0.15-0.03,3.33-0.03,3.33s-0.11,0.28-0.73,0.26
            c-0.46-0.02-1.99-0.26-1.99-0.26"/>

          <path fill="#EFEFEF" stroke="#000000" stroke-width="0.2835" stroke-linecap="round" stroke-linejoin="round"
                stroke-miterlimit="10" d="
            M204.15,157.7l1.03,0.07c0,0,1.07,0.08,1.18-0.22"/>
        </g> <!-- /end ultralatch -->


        <!--  ZOOM    -->
        <g mask="url(#svg-mask)">

          <circle id="grabView" cy="230" cx="204" r="3" fill="#666" opacity="1" stroke-width="0"></circle>

          <polygon id="edgeSection" fill="none" stroke-width="0" stroke-miterlimit="10" points="205.5,218.14 201.5,221.34
    201.5,230.01 205.5,227.52"/>


          <g id="zoom">

            <circle id="backScope" fill="#aaaaaa" opacity="0" cx="225.46" cy="229.36" r="50"/>


            <path id="door_edge" fill="#666666" opacity="0" stroke="#B3B3B3" stroke-linecap="round"
                  stroke-linejoin="round" stroke-miterlimit="10" d="
                    M208.5,276.5v-94.1c6-1.72,10.46-2.66,16.1-2.66c5.93,0,11.9,1.04,16.9,2.94v93.83c0,0-5.5,3.5-15.17,3.5
                    C215.33,280,208.5,276.5,208.5,276.5z"/>

            <path id="white_ruler" fill="#FFFFFF" opacity="0"
                  d="M258.02,267.69l-63.95,0.14C174.4,254.26,176,228,176,228h101.06C277.06,228,277.71,251.85,258.02,267.69z"
            />

            <polygon id="edgeMark" opacity="0" fill="#FF0000" points="242,265.61 208,265.56 208,230 242,230"/>

            <g id="measure" opacity="0">

              <path id="whole" fill="#FFFFFF" d="M212.76,243.14h6.1v13.45h-3.51v-10.57h-2.59V243.14z"/>
              <path id="fraction" fill="#FFFFFF" d="M220.84,243.14h3.91v8.02h-2.4v-6.14h-1.51V243.14z M231.83,243.14h2.36l-9.55,13.45h-2.38L231.83,243.14
                        z M235.96,249.08c0.56,0.4,0.83,0.93,0.83,1.59c0,0.32-0.09,0.63-0.27,0.92c-0.18,0.29-0.42,0.53-0.71,0.71
                        c0.43,0.18,0.78,0.45,1.04,0.82c0.26,0.36,0.38,0.76,0.38,1.2c0,0.72-0.32,1.29-0.95,1.72c-0.63,0.43-1.49,0.64-2.56,0.64
                        s-1.93-0.21-2.56-0.63c-0.63-0.42-0.95-0.99-0.95-1.69c0-0.45,0.14-0.86,0.41-1.23c0.27-0.37,0.65-0.64,1.12-0.82
                        c-0.33-0.2-0.6-0.46-0.8-0.77c-0.2-0.31-0.3-0.62-0.3-0.94c0-0.64,0.28-1.15,0.83-1.54c0.56-0.38,1.29-0.58,2.22-0.58
                        C234.66,248.49,235.41,248.69,235.96,249.08z M232.81,253.46c-0.22,0.15-0.33,0.37-0.33,0.65s0.11,0.5,0.32,0.65
                        c0.21,0.15,0.52,0.23,0.93,0.23s0.72-0.08,0.93-0.23c0.21-0.15,0.32-0.37,0.32-0.65s-0.11-0.5-0.33-0.65
                        c-0.22-0.15-0.52-0.23-0.92-0.23S233.02,253.31,232.81,253.46z M232.94,250.21c-0.18,0.13-0.27,0.33-0.27,0.59
                        c0,0.51,0.35,0.77,1.06,0.77s1.06-0.26,1.06-0.77c0-0.26-0.09-0.45-0.27-0.59c-0.18-0.13-0.44-0.2-0.79-0.2
                        S233.12,250.07,232.94,250.21z"/>
            </g><!--  /end measure   -->


            <g id="ruler_group" opacity="0">

              <polygon id="ruler_lower" points="192.26,267 258.25,267 260.21,264 189.98,264 	"/>

              <polygon id="ruler_upper" fill="#020202" points="176.84,229.28 248.33,229 248.44,229 274.28,229.1 274,233 270.57,233 270.62,235 268.96,235
                    268.91,233 265.82,233 265.87,235 264.21,235 264.16,233 261.07,233 261.2,238 259.54,238 259.41,233 256.32,233 256.37,235
                    254.71,235 254.67,233 251.57,233 251.62,235 249.97,235 249.92,233 247.88,233 247.82,235 246.17,235 246.22,233 243.13,233
                    243.08,235 241.42,235 241.47,233 238.38,233 238.25,238 236.59,238 236.72,233 233.63,233 233.58,235 231.92,235 231.97,233
                    228.88,233 228.83,235 227.17,235 227.23,233 224.13,233 224.16,238 222.5,238 222.48,233 219.38,233 219.33,235 217.68,235
                    217.73,233 214.63,233 214.58,235 212.93,235 212.98,233 209.89,233 209.91,238 208.26,238 208.23,233 205.14,233 205.09,235
                    203.43,235 203.48,233 200.39,233 200.34,235 198.68,235 198.74,233 195.64,233 195.67,238 194.01,238 193.99,233 190.89,233
                    190.84,235 189.18,235 189.24,233 186.15,233 186.09,235 184.44,235 184.49,233 184.53,233 181.44,233 181.39,235 179.73,235
                    179.78,233 177,233"/>

            </g> <!-- /ruler_group -->


            <circle id="lens" opacity="0" fill="none" stroke="#FF0000" stroke-width="2.8347" stroke-miterlimit="10"
                    cx="225.46" cy="229.74" r="50"/>

          </g> <!-- /end ZOOM -->

        </g> <!--   /end MASK   -->


        <script type="text/javascript"><![CDATA[

          let tl3 = new TimelineMax({pause: true }),
              d_arrow = `#d_arrow`,
              other = `#d_arrow2`,
              scope = `#backScope`,
              drEdge = `#door_edge`,
              edgeMark = `#edgeMark`,
              whtRu = `#white_ruler`,
              rulerGp = `#ruler_group`,
              measure = `#measure`,
              lens = `#lens`;


          // fade in entire animation
          tl3.fromTo( "#thickSvg", 1, { opacity: 0 }, { opacity: 1 } )

          // Arrows timed to play together, repeat twice
              .fromTo(d_arrow, 1, {x: "25px", y: "-5px" }, {
                x: "0",
                y: "0",
                ease: Power1.easeOut,
                repeat: 2,
                yoyo: true,
                delay: 1
              } )
              .fromTo(other, 1, {x: "-25px", y: "5px" }, {
                x: "0",
                y: "0",
                ease: Power1.easeOut,
                repeat: 2,
                yoyo: true
              }, "-=3")

              // Introduce the close-up
              .to(lens, 0.5, {opacity: "0.8"})
              .to(scope, 0.5, {opacity: "0.8"}, "-=0.3")


              // fills set for maximum contrast
              .to(drEdge, 0.5, {opacity: "1", fill: "#666", stroke: "#000", strokeWidth: 2}, "-=0")

              // custom SVG Mask for the ruler and background animating in
              .fromTo(whtRu, 0.3, {opacity: "0", y: 50}, {opacity: "1", y: 0, ease: Power2.easeOut})
              .fromTo(rulerGp, 0.3, {opacity: "0", y: 50}, {opacity: "1", y: 0, ease: Power2.easeOut}, "-=0.3")

              // red background and number fades in
              .to(edgeMark, 0.5, {opacity: "1"})
              .to(measure, 0.5, {opacity: "1"});


          tl3.play();

          // Button event actions for hotspot. While hovering button, remove hide class

          let thickButton = document.querySelector('.thickBtn'),
              thickSvg = document.querySelector(`.thickSvg`),
              galleryMsg4 = document.querySelector(`.gallery-message`);

          thickButton.addEventListener("mouseover", function () {

            galleryMsg4.classList.add('hideSvg');
            thickSvg.classList.remove('hideSvg');
            tl3.restart();

          });

          thickButton.addEventListener("mouseout", function () {

            galleryMsg4.classList.remove('hideSvg');
            thickSvg.classList.add('hideSvg');
            tl3.pause();

          });


          ]]>

        </script>
          </svg>

    </div> <!-- THICKNESS SVG -->

<?php








