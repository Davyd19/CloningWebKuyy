## Layout Structure
- Header: Sticky top bar with logo, location selector, search, and notification icons
- Hero Section: None (App directly jumps to category ribbons and feed)
- Sections:
  - Horizontal scrollable category chip ribbon (All, Sports, Music, etc.)
  - Horizontal scrollable date selection ribbon
  - Main Activity Feed (List of cards)
- Footer: Sticky Bottom Navigation Bar (Home, Community, Add/FAB, Messages, Profile)

## Color Palette
- Primary: #FF7A00
- Secondary: #FFE9D6 (Light orange for active states)
- Background: #F8F8F8 (Body)
- Card Background: #FFFFFF
- Text: #212121 (Primary), #757575 (Secondary/Muted)
- Accent: #FF7A00
- Border: #EEEEEE

## Typography
- Heading Font: DMSans
- Body Font: DMSans
- Font Sizes: h1=24px, h2=18px, body=14px, small=12px

## Spacing System
- Section padding: 16px
- Container max-width: 480px (Mobile-first app layout)
- Border Radius: 12px (Cards), 24px (Chips), 50% (FAB)

## Components Identified
- [x] Navbar (sticky top, solid white bg)
- [ ] Hero 
- [x] Cards (Activity cards with image, title, date, location, attendees)
- [x] CTA Buttons (Floating Action Button in Bottom Nav)
- [x] Footer columns (Bottom Navigation Bar)
- [x] Horizontal Scrollable Ribbons

## Database Needs
- [x] Konten dinamis? (Yes: Activities, Categories)
- [ ] Form?
- [x] User management? (Mocked for now)
