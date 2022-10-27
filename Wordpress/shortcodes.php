    	// DIV SHORTCODE. Usage: [div id="ID" class="CLASS"]xxxx[/div]
function createDiv($atts, $content = null) {
   extract(shortcode_atts(array(
      'id' => "",
      'class' => "",
   ), $atts));
return '<div id="'. $id . '" class="'. $class . '" />' . $content . '</div>';
}
add_shortcode('div', 'createDiv');

function CTAtext($atts, $content = null) {
   extract(shortcode_atts(array(
      'id' => "",
      'class' => "ctatext small-12 medium-8 columns",
   ), $atts));
return '<div id="'. $id . '" class="'. $class . '" />' . $content . '</div>';
}
add_shortcode('ctatext', 'CTAtext');

function createCTAlink($atts, $content = null) {
   extract(shortcode_atts(array(
      'id' => "",
      'class' => "ctalink small-12 medium-4 columns",
   ), $atts));
return '<div id="'. $id . '" class="'. $class . '" />' . $content . '</div>';
}
add_shortcode('ctalink', 'createCTAlink');

function createFactfile($atts, $content = null) {
   extract(shortcode_atts(array(
      'id' => "",
      'class' => "factfile",
   ), $atts));
return '<div id="'. $id . '" class="'. $class . '" />' . $content . '</div>';
}
add_shortcode('factfile', 'createFactfile');