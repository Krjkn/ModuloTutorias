//******************** VARIABLE DEL MENÚ ****************************

		// Colorvariables:
		// Color variables take HTML predefined color names or "#rrggbb" strings
		// For transparency make colors and border color ""
		var LowBgColor="";								// Background color when mouse is not over
		var HighBgColor="";								// Background color when mouse is over
		var FontLowColor="#000000";				// Font color when mouse is not over
		var FontHighColor="#0080C0";			// Font color when mouse is over
		var image = BaseHref + ruta_imagenes + "glbnav_background.gif";			// Imagen de fondo
		var BorderColor="";								// Border color
		var BorderWidthMain=0;						// Border width main items
		var BorderWidthSub=1;							// Border width sub items
 		var BorderBtwnMain=1;							// Border between elements main items 1 or 0
		var BorderBtwnSub=1;							// Border between elements sub items 1 or 0
		var FontFamily="verdana,tahoma,arial";	// Font family menu items
		var FontSize=12;									// Font size menu items
		var FontBold=0;										// Bold menu items 1 or 0
		var FontItalic=0;									// Italic menu items 1 or 0
		var MenuTextCentered="center";		// Item text position left, center or right
		var MenuCentered="center";				// Menu horizontal position can be: left, center, right, justify,
				//  leftjustify, centerjustify or rightjustify. PartOfWindow determines part of window to use
		var MenuVerticalCentered="center";		// Menu vertical position top, middle, bottom or static
		var ChildOverlap=.1;							// horizontal overlap child/ parent
		var ChildVerticalOverlap=.1;			// vertical overlap child/ parent
		var StartTop=0;										// Menu offset x coordinate
		var StartLeft=0;									// Menu offset y coordinate
		var VerCorrect=0;									// Multiple frames y correction
		var HorCorrect=0;									// Multiple frames x correction
		var DistFrmFrameBrdr=2;						// Distance between main menu and frame border
		var LeftPaddng=3;									// Left padding
		var TopPaddng=2;									// Top padding
		var FirstLineHorizontal=1;				// First level items layout horizontal 1 or 0
		var MenuFramesVertical=0;					// Frames in cols or rows 1 or 0
		var DissapearDelay=1000;					// delay before menu folds in
		var UnfoldDelay=100;							// delay before sub unfolds	
		var TakeOverBgColor=1;						// Menu frame takes over background color subitem frame
		var FirstLineFrame="topFrame";		// Frame where first level appears
		var SecLineFrame="mainFrame";			// Frame where sub levels appear
		var DocTargetFrame="mainFrame";		// Frame where target documents appear
		var TargetLoc="";									// span id for relative positioning
		var MenuWrap=1;										// enables/ disables menu wrap 1 or 0
		var RightToLeft=0;								// enables/ disables right to left unfold 1 or 0
		var BottomUp=0;										// enables/ disables Bottom up unfold 1 or 0
		var UnfoldsOnClick=0;							// Level 1 unfolds onclick/ onmouseover
		
		//Variables de SubMenu
		var sub_LowBgColor="#014E82";			// Background color when mouse is not over
		var sub_HighBgColor="#Dfdfdf";		// Background color when mouse is over
		var sub_FontLowColor="#DEDECA";		// Font color when mouse is not over
		var sub_FontHighColor="#014E82";	// Font color when mouse is over
		var sub_BorderColor="#DEDECA";		// Border color
		var sub_BorderWidthMain=1;				// Border width main items
		var sub_BorderWidthSub=1;					// Border width sub items
 		var sub_BorderBtwnMain=1;					// Border between elements main items 1 or 0
		var sub_BorderBtwnSub=1;					// Border between elements sub items 1 or 0
		var sub_FontFamily="verdana,tahoma,arial";	// Font family menu items
		var sub_FontSize=12;	
	
					
		///BaseHref+ruta_imagenes + "arrow_down.gif" ///Fechita hacia abajo
		var Arrws=[BaseHref+ruta_imagenes + "arrow_right.gif",7,7,"",7,7,BaseHref+"trileft.gif",5,10,BaseHref+"triup.gif",10,5];
		//alert(BaseHref+ruta_imagenes)
						// Arrow source, width and height.
						// If arrow images are not needed keep source ""

		var MenuUsesFrames=1;			// MenuUsesFrames is only 0 when Main menu, submenus,
						// document targets and script are in the same frame.
						// In all other cases it must be 1

		var RememberStatus=0;			// RememberStatus: When set to 1, menu unfolds to the presetted menu item. 
						// When set to 2 only the relevant main item stays highligthed
						// The preset is done by setting a variable in the head section of the target document.
						// <head>
						//	<script type="text/javascript">var SetMenu="2_2_1";<!--/script-->
						// </head>
						// 2_2_1 represents the menu item Menu2_2_1=new Array(.......

		var PartOfWindow=.8;			// PartOfWindow: When MenuCentered is justify, sets part of window width to stretch to
						
						// Below some pretty useless effects, since only IE6+ supports them
						// I provided 3 effects: MenuSlide, MenuShadow and MenuOpacity
						// If you don't need MenuSlide just leave in the line var MenuSlide="";
						// delete the other MenuSlide statements
						// In general leave the MenuSlide you need in and delete the others.
						// Above is also valid for MenuShadow and MenuOpacity
						// You can also use other effects by specifying another filter for MenuShadow and MenuOpacity.
						// You can add more filters by concanating the strings

		var BuildOnDemand=0;				// 1/0 When set to 1 the sub menus are build when the parent is moused over
		var BgImgLeftOffset=7;			// Only relevant when bg image is used as rollover
		var ScaleMenu=0;						// 1/0 When set to 0 Menu scales with browser text size setting

		var HooverBold=0;						// 1 or 0
		var HooverItalic=0;					// 1 or 0
		var HooverUnderLine=0;			// 1 or 0
		var HooverTextSize=0;				// 0=off, number is font size difference on hoover
		var HooverVariant=0;				// 1 or 0

		var MenuSlide="";
		var MenuSlide="progid:DXImageTransform.Microsoft.RevealTrans(duration=.5, transition=19)";
		var MenuSlide="progid:DXImageTransform.Microsoft.GradientWipe(duration=.5, wipeStyle=1)";//randomdissolve(duration=0.5)";//

		var MenuShadow="";
		var MenuShadow="progid:DXImageTransform.Microsoft.DropShadow(color=#888888, offX=2, offY=2, positive=1)";
		var MenuShadow="progid:DXImageTransform.Microsoft.Shadow(color=#888888, direction=135, strength=3)";

		var MenuOpacity="";
		var MenuOpacity="progid:DXImageTransform.Microsoft.Alpha(opacity=100)";
	
		
		function BeforeStart(){return}
		function AfterBuild(){return}
		function BeforeFirstOpen(){return}
		function AfterCloseAll(){return}

//*******************************************************************