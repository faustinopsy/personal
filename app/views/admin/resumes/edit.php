<?php $this->layout('template'); ?>

<section class="w3-container">
    <h1 class="text-center"><?= $title ?></h1>
    <form action="/admin/resumes/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($resume->id ?? '') ?>">
        <h3>Resumo do Currículo</h3>
        <textarea name="summary" class="w3-input w3-border" placeholder="Resumo do currículo..." required><?= htmlspecialchars($resume->summary ?? '') ?></textarea>
        <h3>Educação</h3>
        <div id="education-section">
            <?php if (!empty($education)): ?>
                <?php foreach ($education as $edu): ?>
                    <div class="education-item">
                        <input type="text" name="education[degree][]" class="w3-input w3-border" placeholder="Grau (Ex: Bacharelado)" value="<?= htmlspecialchars($edu->degree ?? '') ?>" required>
                        <input type="text" name="education[institution][]" class="w3-input w3-border" placeholder="Instituição" value="<?= htmlspecialchars($edu->institution ?? '') ?>" required>
                        <input type="date" name="education[start_date][]" class="w3-input w3-border" value="<?= htmlspecialchars($edu->start_date ?? '') ?>" required>
                        <input type="date" name="education[end_date][]" class="w3-input w3-border" value="<?= htmlspecialchars($edu->end_date ?? '') ?>">
                        <textarea name="education[description][]" class="w3-input w3-border" placeholder="Descrição"><?= htmlspecialchars($edu->description ?? '') ?></textarea>
                        <button type="button" class="w3-button w3-red remove-education">Remover</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="education-item">
                    <input type="text" name="education[degree][]" class="w3-input w3-border" placeholder="Grau (Ex: Bacharelado)" required>
                    <input type="text" name="education[institution][]" class="w3-input w3-border" placeholder="Instituição" required>
                    <input type="date" name="education[start_date][]" class="w3-input w3-border" required>
                    <input type="date" name="education[end_date][]" class="w3-input w3-border">
                    <textarea name="education[description][]" class="w3-input w3-border" placeholder="Descrição"></textarea>
                    <button type="button" class="w3-button w3-red remove-education">Remover</button>
                </div>
            <?php endif; ?>
        </div>
        <button type="button" id="add-education" class="w3-button w3-teal">Adicionar Educação</button>
        <h3>Experiência</h3>
        <div id="experience-section">
            <?php if (!empty($experiences)): ?>
                <?php foreach ($experiences as $exp): ?>
                    <div class="experience-item">
                        <input type="text" name="experience[job_title][]" class="w3-input w3-border" placeholder="Cargo" value="<?= htmlspecialchars($exp->job_title ?? '') ?>" required>
                        <input type="text" name="experience[company_name][]" class="w3-input w3-border" placeholder="Empresa" value="<?= htmlspecialchars($exp->company_name ?? '') ?>" required>
                        <input type="date" name="experience[start_date][]" class="w3-input w3-border" value="<?= htmlspecialchars($exp->start_date ?? '') ?>" required>
                        <input type="date" name="experience[end_date][]" class="w3-input w3-border" value="<?= htmlspecialchars($exp->end_date ?? '') ?>">
                        <textarea name="experience[description][]" class="w3-input w3-border" placeholder="Descrição"><?= htmlspecialchars($exp->description ?? '') ?></textarea>
                        <button type="button" class="w3-button w3-red remove-experience">Remover</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="experience-item">
                    <input type="text" name="experience[job_title][]" class="w3-input w3-border" placeholder="Cargo" required>
                    <input type="text" name="experience[company_name][]" class="w3-input w3-border" placeholder="Empresa" required>
                    <input type="date" name="experience[start_date][]" class="w3-input w3-border" required>
                    <input type="date" name="experience[end_date][]" class="w3-input w3-border">
                    <textarea name="experience[description][]" class="w3-input w3-border" placeholder="Descrição"></textarea>
                    <button type="button" class="w3-button w3-red remove-experience">Remover</button>
                </div>
            <?php endif; ?>
        </div>
        <button type="button" id="add-experience" class="w3-button w3-teal">Adicionar Experiência</button>
        <h3>Tecnologias</h3>
        <div id="technology-section">
            <?php if (!empty($technologies)): ?>
                <?php foreach ($technologies as $tech): ?>
                    <div class="technology-item">
                        <input type="text" name="technology[name][]" class="w3-input w3-border" placeholder="Nome da Tecnologia" value="<?= htmlspecialchars($tech->name ?? '') ?>" required>
                        <select name="technology[proficiency_level][]" class="w3-input w3-border" required>
                            <option value="beginner" <?= $tech->proficiency_level === 'beginner' ? 'selected' : '' ?>>Iniciante</option>
                            <option value="intermediate" <?= $tech->proficiency_level === 'intermediate' ? 'selected' : '' ?>>Intermediário</option>
                            <option value="advanced" <?= $tech->proficiency_level === 'advanced' ? 'selected' : '' ?>>Avançado</option>
                            <option value="expert" <?= $tech->proficiency_level === 'expert' ? 'selected' : '' ?>>Especialista</option>
                        </select>
                        <button type="button" class="w3-button w3-red remove-technology">Remover</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="technology-item">
                    <input type="text" name="technology[name][]" class="w3-input w3-border" placeholder="Nome da Tecnologia" required>
                    <select name="technology[proficiency_level][]" class="w3-input w3-border" required>
                        <option value="beginner">Iniciante</option>
                        <option value="intermediate">Intermediário</option>
                        <option value="advanced">Avançado</option>
                        <option value="expert">Especialista</option>
                    </select>
                    <button type="button" class="w3-button w3-red remove-technology">Remover</button>
                </div>
            <?php endif; ?>
        </div>
        <button type="button" id="add-technology" class="w3-button w3-teal">Adicionar Tecnologia</button>
        <h3>Habilidades</h3>
        <div id="skill-section">
            <?php if (!empty($skills)): ?>
                <?php foreach ($skills as $skill): ?>
                    <div class="skill-item">
                        <input type="text" name="skills[skill_name][]" class="w3-input w3-border" placeholder="Nome da Habilidade" value="<?= htmlspecialchars($skill->skill_name ?? '') ?>" required>
                        <select name="skills[skill_type][]" class="w3-input w3-border" required>
                            <option value="soft" <?= $skill->skill_type === 'soft' ? 'selected' : '' ?>>Habilidade Comportamental</option>
                            <option value="hard" <?= $skill->skill_type === 'hard' ? 'selected' : '' ?>>Habilidade Técnica</option>
                        </select>
                        <button type="button" class="w3-button w3-red remove-skill">Remover</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="skill-item">
                    <input type="text" name="skills[skill_name][]" class="w3-input w3-border" placeholder="Nome da Habilidade" required>
                    <select name="skills[skill_type][]" class="w3-input w3-border" required>
                        <option value="soft">Habilidade Comportamental</option>
                        <option value="hard">Habilidade Técnica</option>
                    </select>
                    <button type="button" class="w3-button w3-red remove-skill">Remover</button>
                </div>
            <?php endif; ?>
        </div>
        <button type="button" id="add-skill" class="w3-button w3-teal">Adicionar Habilidade</button>
        <h3>Redes Sociais</h3>
        <div id="social-section">
            <?php if (!empty($socials)): ?>
                <?php foreach ($socials as $social): ?>
                    <div class="social-item">
                        <input type="text" name="socials[platform][]" class="w3-input w3-border" placeholder="Plataforma" value="<?= htmlspecialchars($social->platform ?? '') ?>" required>
                        <input type="url" name="socials[url][]" class="w3-input w3-border" placeholder="URL" value="<?= htmlspecialchars($social->url ?? '') ?>" required>
                        <button type="button" class="w3-button w3-red remove-social">Remover</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="social-item">
                    <input type="text" name="socials[platform][]" class="w3-input w3-border" placeholder="Plataforma" required>
                    <input type="url" name="socials[url][]" class="w3-input w3-border" placeholder="URL" required>
                    <button type="button" class="w3-button w3-red remove-social">Remover</button>
                </div>
            <?php endif; ?>
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
        addField('add-skill', 'skill-section', 'remove-skill');
        addField('add-social', 'social-section', 'remove-social');
    });
</script>
