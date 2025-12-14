let sectionCount = 1;

        function addSection() {
            sectionCount++;
            const sectionsWrapper = document.getElementById('sections-wrapper');
            
            const newSection = document.createElement('div');
            newSection.className = 'section-item';
            newSection.innerHTML = `
                <div class="section-item-header">
                    <span class="section-number">Section ${sectionCount}</span>
                    <button type="button" class="remove-section-btn" onclick="removeSection(this)">✕ Supprimer</button>
                </div>

                <div class="input-group">
                    <label class="field-label">
                        Titre de la section<span class="required-star">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="section_titles[]" 
                        class="text-input" 
                        placeholder="Ex: Chapitre ${sectionCount} - ..."
                        required
                    >
                </div>

                <div class="input-group">
                    <label class="field-label">
                        Contenu de la section<span class="required-star">*</span>
                    </label>
                    <textarea 
                        name="section_contents[]" 
                        class="textarea-input" 
                        placeholder="Décrivez le contenu de cette section..."
                        required
                    ></textarea>
                </div>

                <div class="input-group">
                    <label class="field-label">
                        Position<span class="required-star">*</span>
                    </label>
                    <input 
                        type="number" 
                        name="section_positions[]" 
                        class="number-input" 
                        value="${sectionCount}"
                        min="1"
                        required
                    >
                    <small class="helper-text">Ordre d'affichage de la section (1, 2, 3...)</small>
                </div>
            `;
            
            sectionsWrapper.appendChild(newSection);
        }

        function removeSection(button) {
            const sectionsWrapper = document.getElementById('sections-wrapper');
            const sections = sectionsWrapper.querySelectorAll('.section-item');
            
            if (sections.length > 1) {
                button.closest('.section-item').remove();
                updateSectionNumbers();
            } else {
                alert('Vous devez avoir au moins une section pour le cours.');
            }
        }

        function updateSectionNumbers() {
            const sections = document.querySelectorAll('.section-item');
            sections.forEach((section, index) => {
                const numberSpan = section.querySelector('.section-number');
                numberSpan.textContent = `Section ${index + 1}`;
            });
            sectionCount = sections.length;
        }