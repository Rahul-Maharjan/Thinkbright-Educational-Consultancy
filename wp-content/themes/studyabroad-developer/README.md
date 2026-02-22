# StudyAbroad Developer - WordPress Theme

A modern, professional, and conversion-focused WordPress theme designed specifically for Study Abroad Consultancy companies. Features a premium blue color scheme with a clean, corporate design.

## Theme Features

### Design

- **Premium Blue Color Scheme**: Primary (#0B3C91), Secondary (#1E90FF), Accent (#00BFFF)
- **Modern & Professional Layout**: Clean, corporate design focused on conversions
- **Fully Responsive**: Mobile-first design that looks great on all devices
- **SEO Optimized**: Schema.org structured data and semantic HTML5
- **Fast Loading**: Optimized CSS and minimal JavaScript

### Custom Post Types

1. **Destinations** - Showcase study abroad destinations with details
2. **Services** - Display your consulting services with pricing
3. **Events** - Promote webinars, seminars, and university fairs
4. **Testimonials** - Feature student success stories
5. **Language Tests** - Information about IELTS, TOEFL, PTE, etc.

### Homepage Sections

1. Hero Section with CTA
2. About Section with features
3. Study Destinations Grid
4. Language Tests Section
5. Services Section
6. Process Timeline
7. Upcoming Events
8. Student Testimonials
9. FAQ Accordion
10. Consultation Form

### Theme Customizer Options

- Logo upload
- Color settings (Primary, Secondary, Accent)
- Hero section content
- About section content
- Contact information
- Social media links
- Footer settings
- FAQ management
- Statistics/counters

## Installation

1. Download or clone the theme to `/wp-content/themes/studyabroad-developer/`
2. Go to **Appearance > Themes** in WordPress admin
3. Activate "StudyAbroad Developer" theme
4. Go to **Appearance > Customize** to configure theme options
5. Create content using the Custom Post Types

## Theme Setup

### 1. Configure Settings

Navigate to **Appearance > Customize** and fill in:

- Site Identity (Logo, Site Title)
- Colors (or keep defaults)
- Hero Section content
- Contact Information
- Social Media URLs

### 2. Create Menus

1. Go to **Appearance > Menus**
2. Create a menu and assign it to "Primary Menu" location
3. Add pages and custom links (#about, #destinations, #services, etc.)

### 3. Add Content

#### Destinations

1. Go to **Destinations > Add New**
2. Enter country name, description, featured image
3. Fill in meta boxes: Universities count, Programs, Requirements, Cost of Living

#### Services

1. Go to **Services > Add New**
2. Enter service name, description, featured image
3. Fill in meta boxes: Price, Duration, Features

#### Events

1. Go to **Events > Add New**
2. Enter event title, description
3. Fill in meta boxes: Date, Time, Location, Event Type, Registration Link

#### Testimonials

1. Go to **Testimonials > Add New**
2. Enter student name, testimonial content, photo
3. Fill in meta boxes: Rating, Destination, Course, University

### 4. Set Homepage

1. Go to **Settings > Reading**
2. Select "A static page"
3. Homepage: Create a page (any title) and set front-page.php template

## File Structure

```
studyabroad-developer/
├── assets/
│   ├── css/
│   │   └── custom.css
│   └── js/
│       └── main.js
├── inc/
│   ├── custom-post-types.php
│   ├── customizer.php
│   ├── template-functions.php
│   └── template-tags.php
├── template-parts/
│   ├── content.php
│   ├── content-none.php
│   ├── content-page.php
│   └── content-single.php
├── 404.php
├── archive.php
├── archive-destination.php
├── archive-event.php
├── archive-service.php
├── comments.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── README.md
├── search.php
├── searchform.php
├── sidebar.php
├── single.php
├── single-destination.php
├── single-event.php
├── single-service.php
└── style.css
```

## Customization

### Colors

Edit CSS variables in `style.css`:

```css
:root {
  --primary-color: #0b3c91;
  --secondary-color: #1e90ff;
  --accent-color: #00bfff;
}
```

### Typography

The theme uses system fonts by default. To add custom fonts, edit `functions.php`:

```php
function studyabroad_developer_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=YourFont&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'studyabroad_developer_fonts' );
```

### Adding New Sections

1. Edit `front-page.php` for homepage sections
2. Add corresponding styles in `style.css`
3. Add JavaScript interactions in `assets/js/main.js`

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- IE 11 (basic support)

## Requirements

- WordPress 5.0+
- PHP 7.4+

## Recommended Plugins

- **Contact Form 7** - For contact forms
- **Yoast SEO** - For SEO optimization
- **WP Super Cache** - For performance
- **Smush** - For image optimization

## Screenshots

To add a screenshot:

1. Create a 1200x900px image
2. Save as `screenshot.png` in theme root

## Changelog

### Version 1.0.0

- Initial release
- Complete theme with all features
- Custom Post Types for Destinations, Services, Events, Testimonials
- Full Theme Customizer integration
- Responsive design
- SEO optimized

## Credits

- Theme by: Developer
- Icons: Feather Icons (SVG)
- Framework: Custom built

## License

GNU General Public License v2 or later

## Support

For support, please contact the theme developer.
