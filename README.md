# Continents Explorer
Group Project for CPS 530

- To create a traveller's help site that provides advice for those who want to travel after the pandemic but do not know where to go.
- For those who have a general idea of where they want to go but are undecided, a rotating map of the seven continents on the homepage and a world map below to help educate the traveller on information like continental scenery, customs, etc. with travelling suggestions
- For those who are undecided, a questionnaire on the navigation bar would effectively help them decide on where to travel depending on the answers they give.

----

- Contents
    - Static Pages
        * Animate Page
        * Home Page
        * Questionnaire Page
        * Brief Pages for seven continents
        * Detailed Pages for seven continents
        * Reference Page
    - Dynamic Pages
        * Login Page
            * Depend on users who already logged in, a different username will be shown on the navigation bar for each page.

----

- Constraints
    1. Login Form
        - PHP was used verify whether the username and password exist in the database.
    2. Sign Form 
        - If the username already exists => jump to a page to with an error reminder; return to the sign interface three seconds later
        - If two passwords entered during registering were different => alert with an error message
    3. Questionnaire From 
        - A survey contains multiple-choice questions and redirect the visitor to the page that best fit his/her interests
    4. Comment Area 
        - allow visitors leave comments and suggestions for a specific continent
        - The maximum is limited to 250 characters.

----

- Responsive Design
    * Responsive design for all pages was used to fit three different device sizes.
    * Firefox browser with Gecko engine may experiencing different looking from other browsers on signup page 
    * IE browser with Trident engine may experiencing difficulties on animate page 

----

- Hosting Environment
    * Apache HTTP Server 2.4
    * PHP 7.4
    * MySQL 8.0.4

----

- Reference
    * Bootstrap. Carousel. https://getbootstrap.com/docs/4.0/components/carousel
    * Bootstrap. Navbar. https://getbootstrap.com/docs/4.0/components/navbar
    * W3Schools. How To Sort a Table. https://www.w3schools.com/howto/howto_js_sort_table.asp
