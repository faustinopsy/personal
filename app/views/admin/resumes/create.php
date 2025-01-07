<?php $this->layout('template'); ?>

<section class="w3-container">
    <h1 class="text-center"><?= $title ?></h1>
    <form action="/admin/resumes/store" method="POST" enctype="multipart/form-data">
        <h3>Resumo do Currículo</h3>
        <textarea name="summary" class="w3-input w3-border" placeholder="Resumo do currículo..." required></textarea>
        <h3>Educação</h3>
        <div id="education-section">
            <div class="education-item">
                <input type="text" name="education[degree][]" class="w3-input w3-border" placeholder="Grau (Ex: Bacharelado)" required>
                <input type="text" name="education[institution][]" class="w3-input w3-border" placeholder="Instituição" required>
                <input type="date" name="education[start_date][]" class="w3-input w3-border" placeholder="Data de Início" required>
                <input type="date" name="education[end_date][]" class="w3-input w3-border" placeholder="Data de Término">
                <textarea name="education[description][]" class="w3-input w3-border" placeholder="Descrição"></textarea>
                <button type="button" class="w3-button w3-white w3-border remove-education">Remover</button>
            </div>
        </div>
        <button type="button" id="add-education" class="w3-button w3-teal">Adicionar Educação</button>
        <h3>Experiência</h3>
        <div id="experience-section">
            <div class="experience-item">
                <input type="text" name="experience[job_title][]" class="w3-input w3-border" placeholder="Cargo" required>
                <input type="text" name="experience[company_name][]" class="w3-input w3-border" placeholder="Empresa" required>
                <input type="date" name="experience[start_date][]" class="w3-input w3-border" placeholder="Data de Início" required>
                <input type="date" name="experience[end_date][]" class="w3-input w3-border" placeholder="Data de Término">
                <textarea name="experience[description][]" class="w3-input w3-border" placeholder="Descrição"></textarea>
                <button type="button" class="w3-button w3-white w3-border remove-experience">Remover</button>
            </div>
        </div>
        <button type="button" id="add-experience" class="w3-button w3-teal">Adicionar Experiência</button>
        <h3>Tecnologias</h3>
        <div id="technology-section">
            <div class="technology-item">
                <input type="text" name="technology[name][]" class="w3-input w3-border" placeholder="Nome da Tecnologia" required>
                <select name="technology[proficiency_level][]" class="w3-input w3-border" required>
                    <option value="beginner">Iniciante</option>
                    <option value="intermediate">Intermediário</option>
                    <option value="advanced">Avançado</option>
                    <option value="expert">Especialista</option>
                </select>
                <button type="button" class="w3-button w3-white w3-border remove-technology">Remover</button>
            </div>
        </div>
        <button type="button" id="add-technology" class="w3-button w3-teal">Adicionar Tecnologia</button>

        <h3>Habilidades</h3>
        <div id="skill-section">
            <div class="skill-item">
                <input type="text" name="skills[skill_name][]" class="w3-input w3-border" placeholder="Nome da Habilidade" required>
                <select name="skills[skill_type][]" class="w3-input w3-border" required>
                    <option value="soft">Habilidade Comportamental</option>
                    <option value="hard">Habilidade Técnica</option>
                </select>
                <button type="button" class="w3-button w3-white w3-border remove-skill">Remover</button>
            </div>
        </div>
        <button type="button" id="add-skill" class="w3-button w3-teal">Adicionar Habilidade</button>

        <h3>Redes Sociais</h3>
        <div id="social-section">
            <div class="social-item">
                <input type="text" name="socials[platform][]" placeholder="Plataforma" required class="w3-input w3-border">
                <input type="url" name="socials[url][]" placeholder="URL" required class="w3-input w3-border">
                <button type="button" class="w3-button w3-white w3-border remove-social">Remover</button>
            </div>
        </div>
        <button type="button" id="add-social" class="w3-button w3-teal">Adicionar Rede Social</button>
        <button type="submit" class="w3-button w3-green">Salvar Currículo</button>
        
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const addField = (buttonId, sectionId, className) => {
            document.getElementById(buttonId).addEventListener('click', () => {
                const section = document.getElementById(sectionId);
                const newField = section.firstElementChild.cloneNode(true);
                newField.querySelectorAll('input, textarea, select').forEach(input => input.value = '');
                section.appendChild(newField);
            });

            document.getElementById(sectionId).addEventListener('click', e => {
                if (e.target.classList.contains(className)) {
                    e.target.parentElement.remove();
                }
            });
        };

        addField('add-education', 'education-section', 'remove-education');
        addField('add-experience', 'experience-section', 'remove-experience');
        addField('add-technology', 'technology-section', 'remove-technology');
        addField('add-social', 'social-section', 'remove-social');
        addField('add-skill', 'skill-section', 'remove-skill');
    });
</script>
