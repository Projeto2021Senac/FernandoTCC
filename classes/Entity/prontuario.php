<?php

namespace Classes\Entity;
use Classes\Dao\db;
use \PDO;
Class Prontuario {


   
    
    public static function getTratamentoInner($proc,$nProc,$c,$pron) {
        $comProtese="";
        if ($nproc=="Protese"){
            $comProtese='inner join protese on fkConsultaT=fkConsulta and fkProcedimentoT=fkProcedimento';
        } 

        return $db = (new db)->executeSQL('SELECT *from tratamento
                                            inner join procedimento on idProcedimento='.$proc.'
                                            inner join paciente on prontuario='.$pron.'
                                            inner join consulta on idConsulta=fkConsulta
                                            inner join dentista on idDentista=CFKDentista
                                            inner join clinica on idClinica=CFKClinica
                                            '.$comProtese.'
                                            where fkConsulta='.$c)
                ->fetchObject(self::class);
    }
    


}