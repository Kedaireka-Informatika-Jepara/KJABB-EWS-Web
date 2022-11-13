<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title_pdf ?></title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        html,
        body {
            width: 210mm;
            height: 297mm;
            font-family: Georgia, serif;
        }

        #header {
            text-align: center;
        }

        #header h4 {
            line-height: 0px;
        }

        #main {
            border-style: solid;
            margin-left: 5px;
            margin-right: 5px;
        }

        #station {
            margin-left: 10px;
        }

        #content {
            margin-left: 10px;
        }

        #conclusion {
            margin-left: 10px;
        }

        #recommendation {
            margin-left: 10px;
        }

        table,
        th,
        td {
            border: 2px solid black;
            border-collapse: collapse;
            font-size: small;
        }
    </style>
</head>

<body>
    <div id="header">
        <h3>CENTER FOR MARINE ECOLOGY AND BIOMONITORING FOR
            <br>SUSTAINABLE AQUACULTURE (Ce-MEBSA)
        </h3>
        <h4>LABORATORIUM TERPADU UNIVERSITAS DIPONEGORO</h4>
        <p>Gedung ICT Lantai 4, Jl. Prof. Soedarto, SH, Tembalang Semarang 50275<br>Telp./Fax +62 856 410 005; e-mail: cemebsa777@gmail.com</p>
    </div>
    <div id="main">
        <div class="row" id="station">
            <?php foreach ($station as $row) ?>
            <p>Station <?php echo $row['station_id'] ?> (<?php echo $row['zone'] ?> Zone - <?php echo $row['water'] ?> Ecosystem)<br>Status: <?php echo $status ?> (<?php echo $result ?>)<br>Created by: <?php echo $row['name'] ?></p>
        </div>
        <div class="row" id="content">
            <div class="column" id="species">
                <h5>Potential Taxa for Bio Indicator</h5>
                <table>
                    <tr>
                        <th>Family</th>
                        <th>Species</th>
                        <th>Abundance</th>
                    </tr>
                    <?php foreach ($species as $row) : ?>
                        <tr>
                            <td style="padding: 5px;"><?php echo $row->family ?></td>
                            <td style="padding: 5px;"><?php echo $row->species ?></td>
                            <td style="text-align: center;"><?php echo $row->abundance ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="column" id="parameter">
                <h5>Abiotic Feature</h5>
                <table>
                    <tr>
                        <th>Abiotik</th>
                        <th>Kelimpahan</th>
                    </tr>
                    <?php foreach ($value as $row) : ?>
                        <tr>
                            <td style="padding: 5px;">Temperature</td>
                            <?php if ($row->temperature == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->temperature ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Salinity</td>
                            <?php if ($row->salinity == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->salinity ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Dissolved Oxygen</td>
                            <?php if ($row->do == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->do ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">pH</td>
                            <?php if ($row->ph == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->ph ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Total Abundance</td>
                            <td style="text-align: center;"><?php echo $row->total_abundance ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Value of Indicator Taxa</td>
                            <td style="text-align: center;"><?php echo $row->taxa_indicator ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Number of Species</td>
                            <td style="text-align: center;"><?php echo $row->number_species ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Diversity</td>
                            <?php if ($row->diversity == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->diversity ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Similarity</td>
                            <?php if ($row->similarity == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->similarity ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Dominance</td>
                            <?php if ($row->dominance == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->dominance ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Conductivity</td>
                            <?php if ($row->conductivity == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->conductivity ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Ratio C/N</td>
                            <?php if ($row->ratiocn == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->ratiocn ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Turbidity</td>
                            <?php if ($row->turbidity == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->turbidity ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Sand</td>
                            <?php if ($row->sand == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->sand ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Clay</td>
                            <?php if ($row->clay == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->clay ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Silt</td>
                            <?php if ($row->silt == null) { ?>
                                <td style="text-align: center;">Normal</td>
                            <?php } else { ?>
                                <td style="text-align: center;"><?php echo $row->silt ?></td>
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="row" id="conclusion">
            <h5>Conclusion :</h5>
            <p><?php echo $conclusion ?></p>
        </div>
        <div class="row" id="recommendation">
            <h5>Recommendation :</h5>
            <p><?php echo $recommendation ?></p>
        </div>
    </div>
</body>

</html>