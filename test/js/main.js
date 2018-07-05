$(document).ready(function() {

	function readfiles(files) {
		var formData = tests.formdata ? new FormData() : null;
		for (var i = 0; i < files.length; i++) {
			if (tests.formdata) {
				formData.append('file', files[i]);
			}

			parseFile(files[i]);
		}
	}
	
	function parseFile(file) {
		if (tests.filereader === true && acceptedTypes[file.type] === true) {
			var reader = new FileReader();

			reader.onload = function(event) {
				holder.innerHTML = event.target.result;
				var svgNode = $(holder).find("svg"),
				result = event.target.result,
				items = [],
				svgTag = result.match('<svg[^>]*>'),
				svgHead = svgTag[0],
				svgFoot = "</svg>";

				while (svgNode.children().length < 2) {
					svgNode = svgNode.children();
				}

				for (var i = 0, length = svgNode.children().length; i < length; i++) {
					var node = svgNode.children().eq(i)[0],
							id = svgNode.children().eq(i).removeAttr("display").attr("id"),
							nodeText = serializer.serializeToString(node);

					nodeText = svgHead + nodeText + svgFoot;
					zip.file(id+".svg", nodeText);

					// Add file previews below if enable-preview is checked.
					if ($('#enable-preview').is(':checked')) {
						items[i] = "<div>"+nodeText+"</div>";
						$("#split-svgs").append(items[i]);
					}
				}

				content = zip.generate();
				location.href="data:application/zip;base64," + content; // Enable for auto-download
			};

			reader.readAsText(file);

		}
	}

	var holder = document.getElementById('holder'),
			serializer = new XMLSerializer(),
			zip = new JSZip(),
			fileArray = [],
			tests = {
			filereader : typeof FileReader != 'undefined',
			dnd : 'draggable' in document.createElement('span'),
	}, support = {
			filereader : document.getElementById('filereader'),
	}, acceptedTypes = {
			'image/svg+xml' : true
	}, fileupload = document.getElementById('upload');

	"filereader".split(' ').forEach(function(api) {
			if (tests[api] === false) {
				support[api].className = 'fail';
			} else {
				support[api].className = 'hidden';
			}
	});

	if (tests.dnd) {
		
	fileupload.querySelector('input').onchange = function() {
		readfiles(this.files);
	};
		
		holder.ondragover = function() {
			this.className = 'hover';
			return false;
		};
		holder.ondragend = function() {
			this.className = '';
			return false;
		};
		holder.ondrop = function(e) {
			this.className = '';
			e.preventDefault();
			readfiles(e.dataTransfer.files);
		};
	}
});