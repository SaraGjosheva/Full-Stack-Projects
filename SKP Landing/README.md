# SKP Landing Page

Welcome to the SKP Landing Page project! This repository contains the code for a marketing landing page designed to showcase the services, client feedback, and company information of a logistics company. The project utilizes Bootstrap for responsive layout, Sass for advanced styling, and PHP for handling contact form into database.

## Table of Contents

1. [Project Overview](#project-overview)
2. [Features](#features)
3. [Technologies Used](#technologies-used)
4. [Installation](#installation)
5. [Usage](#usage)
6. [File Structure](#file-structure)
7. [Contact](#contact)

## Project Overview

This project is a landing page for a logistics company with the following sections:

1. **Banner with Hero Image**:

   - Features a dimmed background image
   - Includes a header title, a brief business description, and a 'Talk to an expert' button

2. **Services Section**:

   - A 'Who we are' part positioned next to an image
   - A set of six cards describing different services offered
   - A call-to-action button at the bottom of the section

3. **Client Feedback Section**:

   - Features a dimmed background image
   - Displays client feedback in two cards with circular client images
   - Includes a heading and a 'Schedule an appointment' button

4. **Company Info Section**:

   - **Expectations Segment**: Lists benefits clients can expect
   - **Partners Segment**: Displays company logos and a call-to-action button
   - **Mission/Vision Segment**: Outlines the company's mission and vision
   - **Values Segment**: Describes the company's core values with icons

5. **Footer Section**:

   - Features a dimmed background image
   - **Get in Touch**: Contact information with phone and email
   - **Map**: Embedded Google map
   - **Contact Form**: Form with fields for name, surname, phone number, email, and company
   - **Social Media**: Links to Facebook, YouTube, and Instagram

## Features

- Responsive design using Bootstrap 5.3.3.
- Custom styling with Sass.
- PHP integration for sending contact form submissions.

## Technologies Used

- **HTML/CSS**: Structure and styling.
- **Bootstrap 5.3.3**: For responsive grid layout and components.
- **Sass**: For advanced CSS preprocessing and modular styling.
- **PHP**: For server-side handling of the contact form.

## Installation

1. **Ensure you have Node.js installed.**

2. **Install Sass globally:**
   ```bash
   npm install -g sass
   ```
3. **Setup XAMPP**

- Place the project directory in the 'htdocs' folder of your XAMPP installation.
- Start Apache and MySQL from the XAMPP control panel.

4. **Configure PHP for Contact Form**

- Ensure PHP is configured correctly in XAMPP.
- Update the 'contact-form.php' file with your email configuration if necessary.

5. **Clone the Repository**

```bash
   git clone https://git.brainster.co/Sara.Gjosheva/project1-skp-saragjosheva.git .
```

## Usage

1. **Compile Sass to CSS**

- Navigate to the project root and compile Sass files to CSS:

```bash
   sass --watch scss/main.scss:css/main.css
```

2. **Access the SKP Landing Page**

- Open your browser and navigate to http://localhost//project1-skp-saragjosheva/index.html to view the SKP landing page.

3. **Submit Contact Form**

- The contact form located in the footer section will send submited data into the database 'skp_landing'.

## File Structure

```bash
   /project1-skp-landing-page
│
├── /Assets                                     # Assets folder with images for the project
│   └── Icons                                   # Image icons for the project
│   └── Pictures                                # Images for the project
│   └── Word Document                           # Requirements
│
├── /css                                        # Css folder (abstracts, components, core, main.css and main.scss)
│   └── abstracts                               # Abstracts folder for variables and mixins
│   │        ├── _variables.scss                # Sass variables
│   │        └── _mixins.scss                   # Sass mixins
│   └── components                              # Components folder contains all the components on the page
│   │        ├── _banner.scss                   # Banner section
│   │        ├── _client-feedback.scss          # Client-Feedback section
│   │        ├── _footer.scss                   # Footer section
│   │        ├── _index.scss                    # Index - containing all other files from component folder
│   │        ├── _mission-vision.scss           # Mission/Vision section
│   │        ├── _partnering-with-us.scss       # Expectations section
│   │        ├── _partners.scss                 # Partners section
│   │        ├── _services.scss                 # Services section
│   │        └── _values.scss                   # Values section
│   └── core                                    # Core folder
│   │        ├── _common-elements.scss          # Common-elements used on the SKP landing page
│   │        ├── _custom-font.scss              # Custom font
│   │        ├── _index.scss                    # Index - containing all other files from core folder
│   │        └── _reboot.scss                   # Reboot
│   └── main.css                                # Compiled CSS file from Sass
│   └── main.css.map                            # Main css map file
│   └── main.scss                               # Main Sass file
│
├── /Screenshots                                # Image assets for the project responsive design
│
│
├── contact-form.php                            # PHP script for handling contact form submissions
│
├── index.html                                  # Main HTML file for the SKP landing page
└── README.md                                   # This file

```

## Section Details

1. **Banner with Hero Image**

- Description: The banner section features a full-width hero image with a dimmed overlay. It includes a header title, a brief description of the company, and a 'Talk to an expert' button. This section is meant to immediately capture the visitor's attention.

2. **Services Section**

- Who We Are: Positioned next to an image, this section provides a brief overview of the company.
- Service Cards: Six cards display different services offered. Each card includes an icon, a title, and a brief description. The bottom of this section includes a 'Talk to an expert' button for further inquiries.

3. **Client Feedback Section**

- Background: Features a dimmed background image to highlight client feedback.
- Feedback Cards: Two cards present client feedback, each with a circular client image, their full name, and the company they work for.
- Call-to-Action: Includes a heading and a 'Schedule an appointment' button, encouraging visitors to engage further.

4. **Company Info Section**

- Expectations Segment: Lists key benefits clients can expect from partnering with the company.
- Partners Segment: Showcases company logos and includes a call-to-action button for potential new partners.
- Mission/Vision Segment: Provides information on the company's mission and vision, with relevant images and text.
- Values Segment: Details the company's core values with icons and descriptions for each value.

5. **Footer Section**

- Get in Touch: Provides contact information, including phone numbers and email addresses, with icons for easy identification.
- Map: Embeds a Google map showing the company's location.
- Contact Form: Allows visitors to send inquiries, including fields for name, surname, phone number, email, and company.
- Social Media: Includes circular links to the social media on Facebook, YouTube, and Instagram.

## Contact

- [Email](mailto:sara_gjosheva@yahoo.com)
- [LinkedIn](https://www.linkedin.com/in/sara-gjosheva)
