    const token = document.querySelector("meta[name='csrf-token']").content;
    
    // Existing deleteProduct function
    function deleteProduct(id) {
        document.querySelector("#product_id_delete").value = id;
        var deleteModal = new bootstrap.Modal(document.getElementById('delete_product_modal'));
        deleteModal.show();
    }

    

    // Existing Select2 initialization
    $(document).ready(function() {
        $('#parent-category').select2({
            placeholder: "Select Parent Category",
            allowClear: true
        });

        $('#parent-category').on('change', function() {
            let parent_category_id = $(this).val();
            $.ajax({
                url: category_route,
                method: 'POST',
                data: {
                    _token: token,
                    parent_category_id: parent_category_id,
                },
                success: function(response) {
                    if (response.status == true) {
                        $('#category').empty();
                        response.data.forEach(function(category) {
                            $('#category').append(
                                `<option value="${category.id}">${category.name}</option>`
                            );
                        });
                        console.log('Updated successfully:', response.data);
                    }
                },
            });
        });

        $('#category').select2({
            placeholder: "Select Category",
            allowClear: true,
        });

        $('#tags').select2({
            placeholder: "Select Tags",
            allowClear: true,
        });

        $('#productType').select2({
            placeholder: "Select Type",
            allowClear: true,
        });

        $('#color').select2({
            placeholder: "Select Color",
            allowClear: true,
        });

        $('.attribute-values').select2({
            placeholder: "Select Values",
            allowClear: true,
        });
    });

    // Existing ClassicEditor initialization
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });

    // Existing Next and Save Product button logic
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#product-tabs .nav-link');
        const nextButton = document.querySelector('.next-tab-btn');
        const saveButton = document.querySelector('.save-btn');

        function updateButtons() {
            const activeTabIndex = Array.from(tabs).findIndex(tab => tab.classList.contains('active'));

            if (activeTabIndex === tabs.length - 1) {
                nextButton.style.display = 'none';
                saveButton.style.display = 'inline-block';
            } else {
                nextButton.style.display = 'inline-block';
                saveButton.style.display = 'none';
            }
        }

        nextButton.addEventListener('click', function() {
            const activeTabIndex = Array.from(tabs).findIndex(tab => tab.classList.contains('active'));
            if (activeTabIndex < tabs.length - 1) {
                const currentTab = tabs[activeTabIndex];
                const nextTab = tabs[activeTabIndex + 1];
                currentTab.classList.remove('active');
                nextTab.classList.add('active');
                document.querySelector(currentTab.dataset.bsTarget).classList.remove('show', 'active');
                document.querySelector(nextTab.dataset.bsTarget).classList.add('show', 'active');
                updateButtons();
            }
        });

        tabs.forEach(tab => {
            tab.addEventListener('shown.bs.tab', updateButtons);
        });

        updateButtons();
    });


    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('dynamicFieldsContainer');
        const addButton = document.getElementById('addFieldButton');

        function addField() {
            const fieldHTML = `
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter dos or dont" name="dos_dont[]"/>
                    <button class="btn btn-danger remove-field" type="button">Remove</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', fieldHTML);
        }

        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-field')) {
                e.target.closest('.input-group').remove();
            }
        });

        addButton.addEventListener('click', addField);
    });

    //installation logic
    document.addEventListener('DOMContentLoaded', function() {
        const installationContainer = document.getElementById('installationFieldsContainer');
        const addInstallationButton = document.getElementById('addInstallationFieldButton');
        let installationIndex = 0;

        // Function to add a new installation card
        function addInstallationField() {
            installationIndex++;
            const installationFieldHTML = `
          <div class="card mb-3">
          <div class="card-body py-4">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter product name" name="installation_steps[${installationIndex}][installation_name]">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" placeholder="Enter product description" name="installation_steps[${installationIndex}][installation_description]">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="installation_steps[${installationIndex}][installation_image]" class="form-control">
            </div>
            <span class="text-danger remove-field cursor-pointer position-absolute p-2"
                style="top: 0; right: 10px;">Remove</span>
            </div>
           </div>
            `;
            installationContainer.insertAdjacentHTML('beforeend', installationFieldHTML);
        }

        // Handle removing cards and prevent removing all
        installationContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-field')) {
                const cardToRemove = e.target.closest('.card');
                if (cardToRemove) {
                    let stepId = cardToRemove.dataset.id;
                    if (stepId && stepId !== "") {
                        let removedStepsField = $("#removed_steps_container");
                        removedStepsField.append(`<input type="hidden" name="removed_steps[]" value="${stepId}">`);
                    }
        
                    cardToRemove.remove();
                }
            }
        });

        // Add event listener for "Add More" button
        addInstallationButton.addEventListener('click', addInstallationField);
    });

    //features product logic
    document.addEventListener('DOMContentLoaded', function() {
        const featuresContainer = document.getElementById('featuresFieldsContainer');
        const addFeatureButton = document.getElementById('addFeatureFieldButton');
        let pFeatureIndex = 0;
        // Function to add a new feature card
        function addFeatureField() {
            pFeatureIndex++;
            const featureFieldHTML = `
       <div class="card mb-3">
        <div class="card-body py-4">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter product name" name="product_features[${pFeatureIndex}][name]">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
               <input type="file" name="product_features[${pFeatureIndex}][image]" class="form-control">
            </div>
            <span class="text-danger remove-field cursor-pointer position-absolute p-2"
                style="top: 0; right: 10px;">Remove</span>
        </div>
         </div>
          `;
            featuresContainer.insertAdjacentHTML('beforeend', featureFieldHTML);
        }

        // Handle removing feature cards
        featuresContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-field')) {
                const cardToRemove = e.target.closest('.card'); // Only remove the clicked card
                if (cardToRemove) {
                    let featuredId = cardToRemove.dataset.id;
                    if (featuredId && featuredId !== "") {
                        let featureField = $("#removed_features_container");
                        featureField.append(`<input type="hidden" name="removed_features[]" value="${featuredId}">`);
                    }
        
                    cardToRemove.remove();
                }
            }
        });

        // Add event listener for "Add More" button
        addFeatureButton.addEventListener('click', addFeatureField);
    });

    // Product type logic
    document.addEventListener('DOMContentLoaded', function() {
        const productTypeDropdown = document.getElementById('productType');
        const simpleProductForm = document.getElementById('simpleProductForm');
        const variableProductForm = document.getElementById('variableProductForm');

        if (!productTypeDropdown || !simpleProductForm || !variableProductForm) {
            console.error('One or more elements not found!'); // Debugging
            return;
        }

        function toggleForms() {
            if (productTypeDropdown.value === 'simple') {
                simpleProductForm.style.display = 'block';
                variableProductForm.style.display = 'none';
            } else if (productTypeDropdown.value === 'variable') {
                simpleProductForm.style.display = 'none';
                variableProductForm.style.display = 'block';
            }
        }

        toggleForms();

        $(productTypeDropdown).on('change', toggleForms);
    });

    document.addEventListener("DOMContentLoaded", function() {
        const addSectionButton = document.getElementById("addSection");
        const sectionsContainer = document.getElementById("sectionsContainer");
        const valuesContainer = document.getElementById("valuesContainer");
        let sectionCounter = 0;

        // Set to track selected attribute IDs
        let selectedAttributeIds = new Set(selectedAttributesId.map(String));
        let selectedAttributes = selectedAttributesValues;

        $(".attribute-values").select2({
            placeholder: "Select Values",
            allowClear: true,
        });

        // Function to check if there are any available attributes left
        function updateAddSectionButtonState() {
            console.log(selectedAttributeIds);
            const availableAttributesCount = attributes.filter(attr => !selectedAttributeIds.has(String(attr
                .id))).length;
            addSectionButton.disabled = availableAttributesCount === 0;
        }

        // Function to create a new section
        function createNewSection() {
            sectionCounter++;
            // Filter out selected attributes for the new section before creating it
            const availableAttributes = attributes.filter(attr => !selectedAttributeIds.has(String(attr.id)));
            console.log("Available attributes for new section:", availableAttributes); // Debugging log

            const newSection = document.createElement("div");
            newSection.className = "card mb-3 section";
            newSection.dataset.section = sectionCounter;

            // Create the HTML for the new section
            newSection.innerHTML = `
                <div class="card-body py-4">
                    <div class="row w-100 relative">
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Attribute Name</label>
                                <select class="form-select attributeName attribute-change" 
                                        name="variations[${sectionCounter}][attribute_id]"
                                        data-section="${sectionCounter}">
                                    <option value="">Select...</option>
                                    ${availableAttributes.map(attr => 
                                        `<option value="${attr.id}">${attr.name}</option>`
                                    ).join('')}
                                </select>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="mb-3">
                                <label class="form-label">Attribute Values</label>
                                <select class="form-select attribute-values" 
                                        name="variations[${sectionCounter}][attribute_values][]" 
                                        data-section="${sectionCounter}" 
                                        multiple>
                                </select>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger removeSection cursor-pointer position-absolute p-2" 
                        style="top: 0; right: 10px;">
                        Remove
                    </span>
                </div>
            `;

            // Initialize Select2 for the new select
            $(newSection).find(".attribute-values").select2({
                placeholder: "Select Values",
                allowClear: true,
            });

            return newSection;
        }

        // Generate all combinations of selected values
        function generateCombinations() {
            valuesContainer.innerHTML = ""; // Clear existing values
            let sections = Object.values(selectedAttributes);
            if (sections.length === 0) return;

            function getCombinations(arr, prefix = []) {
                if (arr.length === 0) return [prefix];
                let result = [];
                let firstSet = arr[0];
                let remainingSets = arr.slice(1);
                firstSet.forEach(value => {
                    result = result.concat(getCombinations(remainingSets, prefix.concat(value)));
                });
                return result;
            }

            let combinations = getCombinations(sections);
            combinations.forEach(comb => {
                const valueName = comb.join("/");
                const valueId = comb.join("-");

                if (!document.querySelector(`[data-value-id="${valueId}"]`)) {
                    const valueSection = createValueSection(valueId, valueName);
                    valuesContainer.appendChild(valueSection);
                }
            });
        }
        let optionCount = 0;

        // Create a value section
        function createValueSection(valueId, valueName) {
            optionCount++;
            const div = document.createElement("div");
            div.className = "card mb-3 value-section";
            div.dataset.valueId = valueId;
            div.innerHTML = `
                <div class="card-body">
                    <h5 class="mb-3">${valueName}</h5>
                    <input type="hidden" name="variation_options[${optionCount}][name]" value="${valueName}" />
                    <div class="row">
                        <div class="col-md-4">
                            <label class="required form-label">Price</label>
                            <input type="number" 
                                name="variation_options[${optionCount}][price]" 
                                class="form-control" 
                                placeholder="Enter Price">
                        </div>
                        <div class="col-md-4">
                            <label class="required form-label">Sale Price</label>
                            <input type="number" 
                                name="variation_options[${optionCount}][sale_price]" 
                                class="form-control" 
                                placeholder="Enter Sale Price">
                        </div>
                        <div class="col-md-4">
                            <label class="required form-label">SKU</label>
                            <input type="text" 
                                name="variation_options[${optionCount}][sku]" 
                                class="form-control" 
                                placeholder="Enter SKU">
                        </div>
                    </div>
                </div>
            `;
            return div;
        }

        function afterFetch(){
            const valuesDropdown = document.querySelectorAll(".attribute-values");
            // Handle value selection
            $(valuesDropdown).on("change", function() {
                let sectionId = this.closest(".section").dataset.section;
                selectedAttributes[sectionId] = Array.from(this.selectedOptions)
                    .map(opt => opt.text);
                generateCombinations();
            });
        }
    
        afterFetch();

        // Event: Attribute selection change
        sectionsContainer.addEventListener("change", function(e) {
            if (e.target.classList.contains("attribute-change")) {
                const section = e.target.closest(".section");
                const sectionId = section.dataset.section;
                const previousAttributeId = section.dataset
                .selectedAttributeId; // Store previous selection
                const selectedAttributeId = e.target.value;
                if (previousAttributeId) {
                    // Remove previous selection from the set
                    selectedAttributeIds.delete(previousAttributeId);
                }
                if (selectedAttributeId) {
                    // Add the new selection to the set
                    selectedAttributeIds.add(selectedAttributeId);
                }
                // Store the currently selected attribute in the section
                section.dataset.selectedAttributeId = selectedAttributeId;
                console.log("Updated selectedAttributeIds:", selectedAttributeIds);
                updateAddSectionButtonState(); // Update button state
                fetch(get_attribute_route, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": token,
                        },
                        body: JSON.stringify({
                            attribute_id: selectedAttributeId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        const valuesDropdown = section.querySelector(".attribute-values");
                        valuesDropdown.innerHTML = data.data.map(item =>
                            `<option value="${item.id}">${item.name}</option>`
                        ).join('');
                        // Reinitialize Select2
                        $(valuesDropdown).select2({
                            placeholder: "Select Values",
                            allowClear: true,
                        });
                        // Handle value selection
                        $(valuesDropdown).on("change", function() {
                            selectedAttributes[sectionId] = Array.from(this.selectedOptions)
                                .map(opt => opt.text);
                            generateCombinations();
                        });
                    });
            }
        });

        // Event: Remove Section
        sectionsContainer.addEventListener("click", function(e) {
            if (e.target.classList.contains("removeSection")) {
                const section = e.target.closest(".section");
                const sectionId = section.dataset.section;
                const removedAttributeId = section.dataset
                .selectedAttributeId; // Get selected attribute
                // If an attribute was selected, add it back to available attributes
                if (removedAttributeId) {
                    selectedAttributeIds.delete(removedAttributeId);
                    // Add removed attribute back to all dropdowns
                    document.querySelectorAll(".attribute-change").forEach(select => {
                        if (!select.querySelector(`option[value="${removedAttributeId}"]`)) {
                            select.innerHTML +=
                                `<option value="${removedAttributeId}">${attributes.find(attr => attr.id == removedAttributeId).name}</option>`;
                        }
                    });
                }
                console.log("Updated selectedAttributeIds after removal:", selectedAttributeIds);
                delete selectedAttributes[sectionId]; // Remove stored values
                section.remove();
                generateCombinations(); // Refresh combinations
                updateAddSectionButtonState(); // Update button state
            }
        });

        // Add new attribute sections
        addSectionButton.addEventListener("click", function() {
            const newSection = createNewSection();
            sectionsContainer.appendChild(newSection);
            updateAddSectionButtonState(); // Update the button state
        });

        // Initialize the button state on page load
        updateAddSectionButtonState();

        // Deleting Gallery Image
        document.querySelectorAll("#image-delete-btn").forEach((el) => {
            el.addEventListener("click", function(e){
                let image_id = this.dataset.id;
                document.querySelector("#delete_id_image").value = image_id;
                var deleteModal = new bootstrap.Modal(document.getElementById('delete_image_modal'));
                deleteModal.show();
            })
        })
    });