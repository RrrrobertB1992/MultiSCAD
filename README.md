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


Currently using:
	JQuery 3.3.1
	BootStrap 3.3.4
	Font Awesome 5.1
	SVGSplit
	JSZip 3.1.5

The website is Responsive and uses CSS3, HTML5 and JavaScript