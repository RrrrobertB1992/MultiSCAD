# MultiSCAD-Web

This project is a HTML and JS based SVG to SCAD generator.
It allows for a single SVG image to generate multiple SCAD files

The Scad files generated are used with openSCADto generate 3D printable 3D models.

Everything is done via Javascript and JQuery.
Once the page loads, internet access is not required.
All files are stored in WebStorage
	https://www.w3schools.com/html/html5_webstorage.asp

User settings will be stored in localstorage, for persistant use in the future.
Imported SVG and generated files will be saved in Session Storage and will be lost when the tab is closed.
	https://www.w3schools.com/html/html5_webstorage.asp


# Extra Codes / Libraries<br>
~JQuery 3.3.1<br>
~BootStrap 3.3.4<br>
~Font-Awesome 5.1 (Reduced down to bare-minimum)<br>
~SVGSplit<br>
~JSZip 3.1.5<br>
<br>
The website is Responsive and uses CSS3, HTML5 and JavaScript