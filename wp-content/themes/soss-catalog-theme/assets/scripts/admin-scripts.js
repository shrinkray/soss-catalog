/**
 *  Javascript Settings for ACF Backend
 */

//  GRM 9/11/2019
//  Sets the default value of this ACF section to 'closed'
//  Hides the Footer Invitation form settings
//  Applied to 'Theme Settings' Option Page
// Added if() conditional -- only fires when ID found

var footerBar = document.getElementById('acf-group_598348c653d34');

if ( footerBar ) {
  footerBar.classList.add('closed');
} else {
  // pass through
}