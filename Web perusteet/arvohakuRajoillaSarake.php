<?php
require_once("functions.php");

if (MinMaxLampoAsetettu() && MinMaxTuuliAsetettu() && PaivamaaraAsetettu()) {
        $arvoKysely = "SELECT * FROM sql_saa 
        WHERE 
        ( pvm BETWEEN '{$_REQUEST['alkupvm']}' AND '{$_REQUEST['loppupvm']}' )
        AND
        ( (tuulennopeus1 BETWEEN {$_REQUEST['MinTuulennopeus']} AND {$_REQUEST['MaxTuulennopeus']} ) AND (tuulennopeus2 BETWEEN {$_REQUEST['MinTuulennopeus']} AND {$_REQUEST['MaxTuulennopeus']}) )
        AND
        ( (ulkolampotila1 BETWEEN {$_REQUEST['MinLampotila']} AND {$_REQUEST['MaxLampotila']}) AND (ulkolampotila2 BETWEEN {$_REQUEST['MinLampotila']} AND {$_REQUEST['MaxLampotila']}) ) ORDER BY {$_REQUEST['sarake']} {$_REQUEST['lajittelu']};";

        tarkistaYhteys($conn, $arvoKysely);
        $arvoKyselynTulokset = mysqli_query($conn, $arvoKysely);
    } else if (MinMaxLampoAsetettu() && PaivamaaraAsetettu()) {
        $arvoKysely = "SELECT * FROM sql_saa 
            WHERE 
            ( pvm BETWEEN '{$_REQUEST['alkupvm']}' AND '{$_REQUEST['loppupvm']}' )
            AND
            ( (ulkolampotila1 BETWEEN {$_REQUEST['MinLampotila']} AND {$_REQUEST['MaxLampotila']}) AND (ulkolampotila2 BETWEEN {$_REQUEST['MinLampotila']} AND {$_REQUEST['MaxLampotila']}) ) ORDER BY {$_REQUEST['sarake']} {$_REQUEST['lajittelu']};";

        tarkistaYhteys($conn, $arvoKysely);
        $arvoKyselynTulokset = mysqli_query($conn, $arvoKysely);
    } else if (MinMaxTuuliAsetettu() && PaivamaaraAsetettu()) {
        $arvoKysely = "SELECT * FROM sql_saa 
            WHERE 
            ( pvm BETWEEN '{$_REQUEST['alkupvm']}' AND '{$_REQUEST['loppupvm']}' )
            AND
            ( (tuulennopeus1 BETWEEN {$_REQUEST['MinTuulennopeus']} AND {$_REQUEST['MaxTuulennopeus']} ) AND (tuulennopeus2 BETWEEN {$_REQUEST['MinTuulennopeus']} AND {$_REQUEST['MaxTuulennopeus']}) ) ORDER BY {$_REQUEST['sarake']} {$_REQUEST['lajittelu']};";
        tarkistaYhteys($conn, $arvoKysely);
        $arvoKyselynTulokset = mysqli_query($conn, $arvoKysely);
    } else if (MinMaxLampoAsetettu() && MinMaxTuuliAsetettu()) {
        $arvoKysely = "SELECT * FROM sql_saa
            WHERE
            ( (tuulennopeus1 BETWEEN {$_REQUEST['MinTuulennopeus']} AND {$_REQUEST['MaxTuulennopeus']} ) AND (tuulennopeus2 BETWEEN {$_REQUEST['MinTuulennopeus']} AND {$_REQUEST['MaxTuulennopeus']}) )
            AND
            ( (ulkolampotila1 BETWEEN {$_REQUEST['MinLampotila']} AND {$_REQUEST['MaxLampotila']}) AND (ulkolampotila2 BETWEEN {$_REQUEST['MinLampotila']} AND {$_REQUEST['MaxLampotila']}) ) ORDER BY {$_REQUEST['sarake']} {$_REQUEST['lajittelu']};";

        tarkistaYhteys($conn, $arvoKysely);
        $arvoKyselynTulokset = mysqli_query($conn, $arvoKysely);
    } else if (MinMaxTuuliAsetettu()) {
        $arvoKysely = "SELECT * FROM sql_saa 
            WHERE 
            (tuulennopeus1 BETWEEN {$_REQUEST['MinTuulennopeus']} AND {$_REQUEST['MaxTuulennopeus']} ) AND (tuulennopeus2 BETWEEN {$_REQUEST['MinTuulennopeus']} AND {$_REQUEST['MaxTuulennopeus']} ) ORDER BY {$_REQUEST['sarake']} {$_REQUEST['lajittelu']};";
        tarkistaYhteys($conn, $arvoKysely);
        $arvoKyselynTulokset = mysqli_query($conn, $arvoKysely);
    } else if (MinMaxLampoAsetettu()) {
        $arvoKysely = "SELECT * FROM sql_saa 
            WHERE 
            (ulkolampotila1 BETWEEN {$_REQUEST['MinLampotila']} AND {$_REQUEST['MaxLampotila']} ) AND (ulkolampotila2 BETWEEN {$_REQUEST['MinLampotila']} AND {$_REQUEST['MaxLampotila']} ) ORDER BY {$_REQUEST['sarake']} {$_REQUEST['lajittelu']};";
        tarkistaYhteys($conn, $arvoKysely);
        $arvoKyselynTulokset = mysqli_query($conn, $arvoKysely);
    } else if (PaivamaaraAsetettu()) {
        $arvoKysely = "SELECT * FROM sql_saa WHERE pvm BETWEEN '{$_REQUEST['alkupvm']}' AND '{$_REQUEST['loppupvm']}' ORDER BY {$_REQUEST['sarake']} {$_REQUEST['lajittelu']};";
        tarkistaYhteys($conn, $arvoKysely);
        $arvoKyselynTulokset = mysqli_query($conn, $arvoKysely);

        // muuten tulostetaan kaikki kannasta sarakeen mukaan järjesteltynä
    } else {
        $arvoKysely = "SELECT * FROM sql_saa ORDER BY {$_REQUEST['sarake']} {$_REQUEST['lajittelu']};";
        tarkistaYhteys($conn, $arvoKysely);
        $arvoKyselynTulokset = mysqli_query($conn, $arvoKysely);
    }
    ?>