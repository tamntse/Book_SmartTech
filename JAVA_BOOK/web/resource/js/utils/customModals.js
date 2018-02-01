const mockupGarages = [
	{id: 1, name: 'Garage Black'},
	{id: 2, name: 'Garage White'},
	{id: 3, name: 'Garage Red'},
	{id: 4, name: 'Garage Blue'},
	{id: 5, name: 'Garage Green'}
], mockupGroups = [
	{id: 1, name: 'Group Alpha'},
	{id: 2, name: 'Group Beta'},
	{id: 3, name: 'Group Gamma'},
	{id: 4, name: 'Group Delta'},
	{id: 5, name: 'Group Epsilon'}
], mockupModelTree = [
	{
		id: 1,
		name: 'Audi',
		models: [
			{ id: 1, name: 'A1' },
			{ id: 2, name: 'A6' },
			{ id: 3, name: 'A7' },
			{ id: 4, name: 'A8' }
		]
	},
	{
		id: 2,
		name: 'BMW',
		models: [
			{ id: 13, name: 'X3' },
			{ id: 14, name: 'X5' },
			{ id: 15, name: 'X6' }
		]
	},
	{
		id: 1,
		name: 'Ford',
		models: [
			{ id: 17, name: 'Fiesta Mk5' },
			{ id: 18, name: 'Fiesta Mk6' },
			{ id: 19, name: 'Focus Mk2' },
			{ id: 20, name: 'Focus Mk3' },
		]
	}
], mockupFuelTypes = [
	{ "id": 1, "name": "Amonia" },
	{ "id": 2, "name": "Bioalcohol" },
	{ "id": 3, "name": "Biodiesel" },
	{ "id": 4, "name": "Biogas" },
	{ "id": 5, "name": "Compressed Natural Gas" },
	{ "id": 6, "name": "Diesel" },
	{ "id": 7, "name": "Electric" },
	{ "id": 8, "name": "Flexible" },
	{ "id": 9, "name": "Hybrid Electric" },
	{ "id": 10, "name": "Hydrogen" },
	{ "id": 11, "name": "Liquefied Natural Gas" },
	{ "id": 12, "name": "Liquefied Petronleum Gas" },
	{ "id": 13, "name": "Petrol" },
	{ "id": 14, "name": "Plug-in Hybrid Electric" },
	{ "id": 15, "name": "Stream Wood Gas" }
], mockupColor = [
	"beige",
	"black",
	"blue",
	"brown",
	"green",
	"orange",
	"purple",
	"red",
	"silver",
	"white",
	"yellow",
]

function renderSelectorOptions(type, selectedID, html = ''){
	// Ajax data
	switch(type){
		case 'model':{
			options = mockupModelTree;
			html += '<option></option>';
		}
		break;case 'fuel':{
			options = mockupFuelTypes;
			html += '<option></option>';
		}
		break;case 'garage':{
			options = mockupGarages;
			html += '<option></option>';
		}
		break;case 'group':{
			options = mockupGroups;
			html += '<option value="null">------ None ------</option>';
		}
		break;
	}

	if(type === 'model'){
		return options.reduce((html, brand) => {
			return html + `<optgroup label="${brand.name}">
				${brand.models.reduce((htmlLv2, model) => {
					return htmlLv2 + `<option value="${model.id}" ${((model.id == selectedID) && 'selected') || ''}>${model.name}</option>`
				}, '')}
			</optgroup>`
		}, html);
	}

	return options.reduce((html, option) => {
		return html + `<option value="${option.id}" ${((option.id == selectedID) && 'selected') || ''}>${option.name}</option>`
	}, html);
}

function renderColorOptions(selectedColor, html = ''){
	const colorOptions = mockupColor;

	return colorOptions.reduce((html, option) => {
		return html + `<label class="btn btn-default ${((selectedColor === option) && 'active') || ''}">
			<input type="radio" value="${option}" autocomplete="off" ${((selectedColor == option) && 'checked') || ''} >
			<div><i class="fa fa-car" style="font-weight:bold; color:${option}; text-shadow: 0 0 1px black;"></i></div>
			<div>${option}</div>
		</label>`
	}, html);
}

function renderSelectorModal(type, modalNode, vehicles){
	

	modalNode.innerHTML =`<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
				</button>
				<h2 class="modal-title">Change ${type}</h2>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<select data-placeholder="Please select ${type}..." class="form-control" id="modalItemSelector" required>
						${renderSelectorOptions(type)}
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary">OK</button>
			</div>
		</div>
	</div>`;

	$(modalNode).find('#modalItemSelector').chosen({
		width: "100%",
		no_results_text: "No result!"
	});
}

function renderCreateVehicleModal(modalNode, { name, modelID, year, garageID, groupID, transmissionType, transmissionDetail, engine, fuel, color, description }){
	// Ajax data here
	const garage = mockupGarages,
		group = mockupGroups;

	let jqModalNode = $(modalNode)

	jqModalNode.html(`<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
				</button>
				<h2 class="modal-title">New Vehicle</h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-6 form-group">
						<label>Vehicle's name*</label>
						<input type="text" placeholder="Vehicle's name" value="${name || ''}" id="newName" class="form-control" required>
					</div>
					<div class="col-sm-6 form-group">
						<label>License*</label>
						<input type="text" placeholder="Vehicle's license" id="newLicense" class="form-control" required>
					</div>
					<div class="col-sm-6 form-group">
						<label>Vehicle's model*</label>
						<select data-placeholder="Please select vehicle's model..." class="input-group chosen-select" required>
							${renderSelectorOptions('model', modelID)}
						</select>
					</div>
					<div class="col-sm-6 form-group">
						<label>Year*</label>
						<input type="number" placeholder="Production year" value="${year || ''}" class="form-control" required>
					</div>
					<div class="col-sm-6 form-group">
						<label>Garage*</label>
						<select data-placeholder="Please select fuel type..." class="input-group chosen-select" required>
							${renderSelectorOptions('garage', garageID)}
						</select>
					</div>
					<div class="col-sm-6 form-group">
						<label>Vehicle's group*</label>
						<select data-placeholder="Please select fuel type..." class="input-group chosen-select" required>
							${renderSelectorOptions('group', groupID)}
						</select>
					</div>
					<div class="col-sm-6 form-group">
						<label>Transmission type</label>
						<div class="btn-group btn-group-justified" data-toggle="buttons" >
							<label class="btn btn-success ${(transmissionType && (transmissionType == 1) && 'active') || ''}">
								<input type="radio" value="1" autocomplete="off" ${(transmissionType && (transmissionType == 1) && 'checked') || ''} >Automatic
							</label>
							<label class="btn btn-info ${(transmissionType && (transmissionType == 2) && 'active') || ''}">
								<input type="radio" value="2" autocomplete="off" ${(transmissionType && (transmissionType == 2) && 'checked') || ''} >Manual
							</label>
						</div>
					</div>
					<div class="col-sm-6 form-group">
						<label>Transmission detail</label>
						<input type="text" placeholder="Transmission detail" value="${transmissionDetail || ''}" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label>Engine</label>
						<input type="text" placeholder="Engine" value="${engine || ''}" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label>Fuel type</label>
						<select data-placeholder="Please select fuel type..." class="input-group chosen-select">
							${renderSelectorOptions('fuel', fuel)}
						</select>
					</div>
					<div class="col-sm-12 form-group">
						<label>Vehicle's color</label>
						<div class="btn-group btn-group-justified" data-toggle="buttons" >
							${renderColorOptions(color)}
						</div>
					</div>
					<div class="col-sm-12 form-group">
						<label>Description</label>
						<textarea type="text" placeholder="Please enter your vehicle's description" rows="20" maxlength="200" class="form-control">${description || ''}</textarea>
					</div>
					<div class="col-sm-12 form-group">
						<label>Car pictures</label>
						<div id="imageDropzone" class="dropzone">
							<div class="dropzone-previews"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary">OK</button>
			</div>
		</div>
	</div>`);

	jqModalNode.find('.chosen-select').chosen({
		width: "100%",
		no_results_text: "No result!"
	});

	let imageDropzone = $("#imageDropzone").dropzone({
		url: '#'
		, autoProcessQueue: false
		, parallelUploads: 5
		, maxFilesize: 2
		, uploadMultiple: true
		, addRemoveLinks: "dictRemoveFile"
		, hiddenInputContainer: '.modal-body'
		, maxFiles: 5
		, acceptedFiles: "image/jpeg,image/png,image/gif"
		, init: function () {
			// this.element.querySelector('input[name="submit-img"]').addEventListener("click", function (e) {
			// 	e.preventDefault();
			// 	e.stopPropagation();
			// 	myDropzone.processQueue();
			// });
			this.on("sendingmultiple", () => {
				alert("sending");
			});
			this.on("successmultiple", (files, response) => {
				alert("success");
			});
			this.on("errormultiple", (files, response) => {
				alert("fail");
			});
		}
	});
}

function renderConfirmModal(type, action, modalNode, items){
	modalNode.innerHTML = `<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header red-bg">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
				</button>
				<h2 class="modal-title">
					${action === 'delete' ? 'Deletion'
						: (action === 'deactivate' ? 'Deactivation'
						: (action === 'activate' ? 'Activation'
						: ''))} Confirmation
				</h2>
			</div>
			<div class="modal-body">
				You are about to ${action} following ${type}(s):
				<ul>${items.reduce((html, item) => {
					return html + `<li>${item.name}</li>`
				}, '')}</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-danger">Yes</button>
			</div>
		</div>
	</div>`;
}