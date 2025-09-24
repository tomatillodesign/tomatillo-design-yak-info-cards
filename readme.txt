=== Yak Info Cards ===
Contributors: tomatillodesign
Tags: custom block, ACF block, info cards, grid layout, Gutenberg, responsive, hyphenation, team directory, service cards, product showcase
Requires at least: 6.0
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Professional, flexible info card system for WordPress with advanced customization, responsive design, and intelligent text handling.

== Description ==

**Yak Info Cards** is a comprehensive content presentation system that transforms how you display information on your WordPress site. Built with Advanced Custom Fields PRO, it offers multiple card types, intelligent text handling, and responsive design that adapts to any screen size.

**Why Choose Yak Info Cards?**

* **Multiple Card Types**: Text, Photo, Video, Icon, Cover, and Group cards for every use case
* **Smart Hyphenation**: Automatic text hyphenation with granular control (None, Title Only, Title + Body)
* **Responsive by Design**: Mobile-first approach with intelligent scaling and ResizeObserver integration
* **Performance Optimized**: Lightweight JavaScript with conditional loading and debounced events
* **Advanced Customization**: Color contrast detection, custom Font Awesome icons, flexible layouts
* **Professional Quality**: WordPress coding standards compliant with comprehensive documentation

**Perfect for:**
* Team member directories and staff profiles
* Service offerings and feature showcases
* Product catalogs and e-commerce displays
* Educational content and course listings
* Healthcare provider directories
* Event calendars and venue showcases
* Customer testimonials and social proof
* Resource libraries and document collections

== Features ==

**Core Functionality:**
* Responsive card layout with full-width `align: full` support
* Six distinct card types: Text, Photo, Video, Icon, Cover, and Group
* Advanced Custom Fields integration with bundled field definitions
* Custom block registration via ACF's `acf_register_block_type()` API
* Semantic HTML structure for accessibility and SEO

**Smart Text Handling:**
* Automatic hyphenation detection based on card width
* Three hyphenation modes: None, Title Only, Title + Body
* Mobile-optimized text flow with intelligent breakpoints
* Performance-aware implementation that only runs when needed

**Advanced Styling:**
* Color contrast detection for optimal readability
* Custom Font Awesome icon support with custom code input
* Responsive cover card scaling with intelligent content fitting
* Flexible layout options with multiple alignment choices
* CSS custom properties for easy theme integration

**Performance Features:**
* ResizeObserver integration for efficient responsive handling
* Debounced window resize events for optimal performance
* Conditional JavaScript loading based on content presence
* Clean, minimal HTML output with semantic structure

**Developer Features:**
* WordPress Coding Standards compliant (WPCS)
* PHP CodeSniffer configuration included (`phpcs.xml`)
* Comprehensive JSDoc documentation
* Modular template system for easy customization
* Extensible architecture for custom card types

== Installation ==

1. **Upload the plugin** to `/wp-content/plugins/yak-info-cards/` or clone via Git:
   ```bash
   git clone https://github.com/tomatillodesign/yak-info-cards.git
   ```

2. **Activate the plugin** through the **Plugins** menu in WordPress

3. **Ensure ACF PRO is installed** and activated (required for block functionality)

4. **Start building** by adding the "Info Cards" block in the Gutenberg editor

== Usage ==

**Quick Start:**
1. Insert the "Info Cards" block in any post, page, or custom block area
2. Configure card group settings in the sidebar panel
3. Add individual cards using the "Add Card" button
4. Choose card type (Text, Photo, Video, Icon, Cover, or Group)
5. Fill in content using the provided ACF fields
6. Customize styling as needed

**Card Types Explained:**
* **Text Cards**: Content-heavy layouts with rich text formatting
* **Photo Cards**: Image-focused with overlay text and custom positioning
* **Video Cards**: Video content with custom thumbnails and playback options
* **Icon Cards**: Font Awesome integration with custom icon support
* **Cover Cards**: Full-cover layouts with intelligent text scaling
* **Group Cards**: Organized collections with consistent styling

**Advanced Features:**
* **Hyphenation Control**: Set automatic hyphenation to None, Title Only, or Title + Body
* **Custom Icons**: Use any Font Awesome icon with custom code input
* **Color Contrast**: Automatic detection ensures readable text colors
* **Responsive Scaling**: Cover cards automatically scale content to fit

**Customization:**
* **Styling**: Modify `blocks/clb-custom-info-card/clb_custom_info_card.css`
* **Templates**: Customize card renderers in `templates/` directory
* **Fields**: Extend ACF field groups in `yak-card-deck.php`
* **JavaScript**: Extend functionality with custom event listeners

== Frequently Asked Questions ==

= Do I need ACF PRO? =
Yes. This plugin uses ACF's block registration API which is only available in ACF PRO. The plugin includes all necessary field definitions and doesn't require manual import.

= Can I customize the card layout? =
Absolutely! The block's layout is defined in `clb_custom_info_card.php` and styled in `clb_custom_info_card.css`. The modular template system makes it easy to create custom card types.

= How does the hyphenation feature work? =
The plugin automatically detects when cards are too narrow for optimal text flow and applies hyphenation based on your settings. You can choose to hyphenate titles only, or both titles and body text.

= Can I use custom Font Awesome icons? =
Yes! The plugin supports both predefined Font Awesome icons and custom icon code input. Simply paste the complete icon code from the Font Awesome website.

= Is the plugin mobile-friendly? =
Yes! The plugin is built with a mobile-first approach and includes responsive design features like intelligent scaling and mobile-optimized text handling.

= Can I extend the plugin with custom card types? =
Yes! The plugin uses a modular template system. You can add new card types by creating new templates in the `templates/` directory and extending the ACF field groups.

== Screenshots ==

1. **Card Group Settings**: Configure layout, spacing, and hyphenation options
2. **Text Card**: Rich content with custom styling and responsive design
3. **Photo Card**: Image-focused layout with overlay text and custom positioning
4. **Video Card**: Video content with custom thumbnails and playback options
5. **Icon Card**: Font Awesome integration with custom icon support
6. **Cover Card**: Full-cover layout with intelligent text scaling
7. **Group Layout**: Organized collections with consistent styling
8. **Mobile View**: Responsive design that adapts to any screen size

== Changelog ==

= 1.1 =
* Added custom Font Awesome icon support with custom code input
* Implemented intelligent hyphenation system with granular control
* Enhanced responsive design with ResizeObserver integration
* Improved performance with conditional JavaScript loading
* Added comprehensive WordPress coding standards compliance
* Enhanced documentation and code quality
* Fixed formatting issues and improved maintainability

= 1.0.0 =
* Initial release of Yak Info Cards block
* Six card types: Text, Photo, Video, Icon, Cover, and Group
* ACF PRO integration with bundled field definitions
* Responsive design with full-width alignment support
* Basic styling and template system

== Upgrade Notice ==

= 1.1 =
Major update with custom icon support, intelligent hyphenation, and enhanced performance. No breaking changes - existing content will continue to work.

= 1.0.0 =
First stable version. Make sure ACF PRO is installed and activated.

== Credits ==

Developed by [Tomatillo Design](https://github.com/tomatillodesign) - Professional WordPress development and design services.

Special thanks to:
* Advanced Custom Fields team for the powerful block API
* Font Awesome for the comprehensive icon library
* WordPress community for coding standards and best practices

== License ==

This plugin is licensed under the GPLv2 or later. See the [GNU General Public License](https://www.gnu.org/licenses/gpl-2.0.html) for details.