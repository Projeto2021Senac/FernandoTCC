<div class="container-fluid">
    <main>

        <section>
            <a href="pesquisarConsulta.php">
                <button class="btn btn-success mt-4">Retornar</button>
            </a>

        </section>



    </main>
    <div class="col-8 offset-2">
        <div class="p-3 bg-dark" style="border-radius:25px">
            <div class="border border-white rounded p-2">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                <form method="post" style="color: white">
                    <div class="d-flex">
                        <div class="form-group col-6 p-1">
                            <label>Paciente Atendido</label>
                            <select name="paciente" class="selectpicker form-control" data-live-search="true" data-size=5>
                                <option selected hidden="">[SELECIONE]</option>
                                <?php

                                foreach ($objPaciente as $paciente) {
                                    $selected = ($objConsulta->fkProntuario == $paciente->prontuario ? 'selected = selected' : '');
                                    echo "<option value = " . $paciente->prontuario . " " . $selected . ">" . $paciente->nomePaciente . "</option>";
                                }
                                ?>
                            </select>
                            <div class="form-group">
                                <label>Data da Consulta</label>
                                <input class="form-control" placeholder="YYYY- MM - DD" onkeypress="mascara(this, '####-##-##')" onchange="getHorarios(this.value)" type="text" id="datepicker" name="data" value="<?= $objConsulta->dataConsulta ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" hidden name="horarioAUX" id="horarioAUX" value="">
                                <label>Hora da Consulta</label>
                                <select readonly class="selectpicker form-control" name="horarios" id="horarios" data-live-search="true" data-size=5>
                                    <option>---[SELECIONE UMA DATA]---</option>
                                    <option <?= (TITLE != "Cadastrar Nova Consulta" ? 'selected = selected' : '') ?> hidden="hidden"><?= $objConsulta->horaConsulta ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-6 p-1">
                            <label>Quem indicou</label>
                            <select name="dentista" class="selectpicker form-control" data-live-search="true" data-size=5>
                                <option hidden="">[SELECIONE]</option>
                                <?php
                                foreach ($objDentista as $dentista) {
                                    $selected = ($objConsulta->CFKDentista == $dentista->idDentista ? 'selected = selected' : '');
                                    echo "<option value =" . $dentista->idDentista . " " . $selected . ">" . $dentista->nomeDentista . "</option>";
                                }
                                ?>
                            </select>
                            <div class="form-group">
                                <label>Cl??nica</label>
                                <select name="clinica" class="selectpicker form-control" data-live-search="true" data-size=5>
                                    <option hidden="">[SELECIONE]</option>
                                    <?php
                                    foreach ($objClinica as $clinica) {
                                        $selected = ($objConsulta->CFKClinica == $clinica->idClinica ? 'selected = selected' : '');
                                        echo "<option value =" . $clinica->idClinica . " " . $selected . ">" . $clinica->nomeClinica . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status da Consulta</label>
                                <select class="form-control" name="status">
                                    <option>Agendada</option>
                                    <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Confirmada' ? print('selected = selected') : '') ?>>Confirmada</option>
                                    <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Cancelada' ? print('selected = selected') : '') ?>>Cancelada</option>
                                    <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Em andamento' ? print('selected = selected') : '') ?>>Em andamento</option>
                                    <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Finalizada' ? print('selected = selected') : '') ?>>Finalizada</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <label>Observa????es pr??-Consulta</label>
                    <textarea name="relatorio" class="form-control" rows="3"><?= (TITLE != 'Cadastrar Nova Consulta'  ? $objConsulta->relatorio : '') ?></textarea>
                    <div class="d-flex justify-content-center p-2">

                        <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" style="width:20%" value="<?= (TITLE == "Cadastrar Nova Consulta" ? 'Cadastrar' : 'Editar') ?>" <?php //if ($btEnviar == TRUE) echo "disabled";
                                                                                                                                                                                                        ?>>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $erro ?>
<script src="js/JQuery2.min.js"></script>
<?php
if (TITLE != "Cadastrar Nova Consulta") {
    echo "<script>
    $( document ).ready(function() {
        data = document.getElementById('datepicker');
        document.getElementById('horarios').value = getHorarios(data.value);
});
</script>";
}
?>