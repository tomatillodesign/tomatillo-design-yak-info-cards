# Yak Info Cards

**Professional, flexible info card system for WordPress** - Create stunning card layouts with advanced customization, responsive design, and intelligent text handling.

![Plugin Screenshot](https://github.com/tomatillodesign/yak-info-cards/assets/screenshot-1.png)

---

## 🎯 **What Makes This Plugin Special**

Yak Info Cards isn't just another card plugin. It's a **comprehensive content presentation system** that combines the power of Advanced Custom Fields with intelligent design features:

- **🎨 Multiple Card Types**: Text, Photo, Video, Icon, Cover, and Group cards
- **🧠 Smart Text Handling**: Automatic hyphenation with granular control
- **📱 Responsive by Design**: Mobile-first approach with intelligent scaling
- **⚡ Performance Optimized**: Lightweight JavaScript with ResizeObserver
- **🎛️ Advanced Customization**: Color contrast detection, custom icons, flexible layouts

---

## 🎨 **Card Types & Flexibility**

### **📝 Text Cards**
Perfect for content-heavy information with rich text formatting and custom styling options.

### **📸 Photo Cards**
Image-focused layouts with overlay text, custom positioning, and responsive scaling.

### **🎥 Video Cards**
Video content with custom thumbnails, play buttons, and modal or embedded playback.

### **🎯 Icon Cards**
Font Awesome integration with custom icon support, perfect for feature highlights.

### **🖼️ Cover Cards**
Full-cover layouts with intelligent text scaling and overlay content positioning.

### **📋 Group Cards**
Organized collections with consistent styling and flexible grid layouts.

---

## 🧠 **Smart Features**

### **📖 Intelligent Hyphenation**
- **Automatic Detection**: Scans card widths and applies hyphenation when needed
- **Granular Control**: Choose between "None", "Title Only", or "Title + Body"
- **Mobile Optimization**: Enhanced readability on smaller screens
- **Performance Aware**: Only runs when necessary to maintain speed

### **🎨 Advanced Styling**
- **Color Contrast Detection**: Automatically ensures readable text colors
- **Custom Icon Support**: Use any Font Awesome icon with custom code
- **Responsive Scaling**: Cover cards automatically scale content to fit
- **Flexible Layouts**: Multiple alignment and spacing options

### **⚡ Performance Features**
- **ResizeObserver Integration**: Efficient responsive handling
- **Debounced Events**: Optimized window resize handling
- **Conditional Loading**: JavaScript only runs when needed
- **Clean Output**: Minimal HTML with semantic structure

---

## 🛠️ **How It Works**

### **🏗️ Architecture**
```
📁 blocks/clb-custom-info-card/
├── 📄 block.json              # Block registration
├── 🎨 clb_custom_info_card.css # Main stylesheet
├── ⚙️ clb_custom_info_card.php  # Block renderer
├── 📁 includes/               # Core functionality
│   ├── 📄 get-card-data.php   # Data retrieval
│   ├── 📄 get-card-group-attributes.php # Group settings
│   ├── 📄 template-loader.php # Template system
│   └── 📁 helpers/           # Utility functions
└── 📁 templates/              # Card type templates
    ├── 📄 render-card.php     # Base card template
    ├── 📄 render-card-text.php # Text card
    ├── 📄 render-card-photo.php # Photo card
    ├── 📄 render-card-video.php # Video card
    ├── 📄 render-card-icon.php # Icon card
    ├── 📄 render-card-cover.php # Cover card
    └── 📄 render-card-group.php # Group wrapper
```

### **🔧 Customization Points**

**Styling**: `blocks/clb-custom-info-card/clb_custom_info_card.css`
- Responsive breakpoints
- Card type specific styles
- Hyphenation CSS rules
- Color and typography variables

**Functionality**: `yak-card-deck.php`
- ACF field definitions
- Block registration
- Color utility functions
- Hyphenation settings

**Templates**: `templates/` directory
- Individual card type renderers
- Conditional logic for different card types
- Custom icon handling
- Modal and link functionality

---

## 📋 **Requirements**

- **WordPress**: 6.0+
- **PHP**: 7.4+
- **Advanced Custom Fields PRO**: Required for block functionality

---

## 🚀 **Installation**

1. **Clone or download** the plugin:
   ```bash
   git clone https://github.com/tomatillodesign/yak-info-cards.git wp-content/plugins/yak-info-cards
   ```

2. **Activate** in WordPress admin under **Plugins**

3. **Ensure ACF PRO** is installed and active

4. **Start building** with the "Info Cards" block in Gutenberg

---

## 🎯 **Quick Start Guide**

1. **Add the Block**: Insert "Info Cards" in any post/page
2. **Configure Settings**: Use the sidebar to set up card group options
3. **Add Cards**: Click "Add Card" to create individual cards
4. **Choose Card Type**: Select from Text, Photo, Video, Icon, or Cover
5. **Customize Content**: Fill in titles, descriptions, images, and links
6. **Style as Needed**: Modify CSS for custom branding

---

## 🔧 **Development**

### **Code Quality**
- **WordPress Coding Standards**: Full compliance with WPCS
- **PHP CodeSniffer**: Automated linting with `phpcs.xml`
- **JSDoc Documentation**: Comprehensive JavaScript documentation
- **Semantic HTML**: Accessible markup structure

### **Extending the Plugin**
- **Custom Card Types**: Add new templates in `templates/`
- **Additional Fields**: Extend ACF field groups in `yak-card-deck.php`
- **Custom Styling**: Override CSS variables for theme integration
- **JavaScript Hooks**: Extend functionality with custom event listeners

---

## 📄 **License**

GPLv2 or later - See [`license.txt`](license.txt)

---

## 👥 **Support & Community**

- **GitHub Issues**: Report bugs and request features
- **Documentation**: Comprehensive inline code documentation
- **WordPress Standards**: Follows official WordPress coding guidelines

---

## ✍️ **Credits**

Developed by [Tomatillo Design](https://github.com/tomatillodesign) - Professional WordPress development and design services.