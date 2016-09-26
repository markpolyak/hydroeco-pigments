@extends('app')

@section('content')

    <div id="page-wrapper">
        <?php

        $cnn = pg_connect("host=pg.sweb.ru port=5432 dbname=mpolyakru_hbio user=mpolyakru_hbio password=test1234") or die("Connection Error");

        if(isset($_GET['updatePigment']))
        {
            $id_trophic_characterization = $_GET['id_trophic_characterization'];
            $id_horizon = $_GET['id_horizon'];
            $volume_of_filtered_water = $_GET['volume_of_filtered_water'];
            $chlorophyll_a_concentration = $_GET['chlorophyll_a_concentration'];
            $chlorophyll_b_concentration = $_GET['chlorophyll_b_concentration'];
            $chlorophyll_c_concentration = $_GET['chlorophyll_c_concentration'];
        
            $pigment_index = $_GET['pigment_index'];
            $pheopigments = $_GET['pheopigments'];
            $ratio_of_chl_a_to_chl_c = $_GET['ratio_of_chl_a_to_chl_c'];
            $pigment_comment = $_GET['pigment_comment'];
            $pigment_serial_number = $_GET['pigment_serial_number'];
            $id_photosynthetic_pigments_sample = $_GET['id_photosynthetic_pigments_sample'];
            
            $query = pg_query($cnn, "UPDATE photosynthetic_pigments_samples SET id_trophic_characterization = '$id_trophic_characterization', id_horizon = '$id_horizon', volume_of_filtered_water = '$volume_of_filtered_water', chlorophyll_a_concentration = '$chlorophyll_a_concentration', chlorophyll_b_concentration = '$chlorophyll_b_concentration', chlorophyll_c_concentration = '$chlorophyll_a_concentration', pigment_index = '$pigment_index', ratio_of_chl_a_to_chl_c = '$ratio_of_chl_a_to_chl_c', comment = '$pigment_comment', serial_number = '$pigment_serial_number' WHERE id_photosynthetic_pigments_sample = '$id_photosynthetic_pigments_sample'");
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit;
        }


        if(isset($_GET['deletePigment']))
        {
            $id_photosynthetic_pigments_sample = $_GET['id_photosynthetic_pigments_sample'];
            $query = pg_query($cnn, "DELETE FROM photosynthetic_pigments_samples WHERE id_photosynthetic_pigments_sample = $id_photosynthetic_pigments_sample");
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit;
        }


        ?>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">

                        <div class="ibox-title">

                            <legend>Данные по пробе</legend>

                            <p>Дата пробы

                                <?php
                                    if(isset($_GET['date'])) {
                                        echo $_GET{'date'};
                                    }
                                ?>
                            </p>

                            <p>Номер станции

                                <?php
                                if(isset($_GET['id_station'])) {
                                    echo $_GET{'id_station'};
                                }
                                ?>

                            </p>
                            <br>

                            <h3>Данные по пигментам</h3>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>

                        @foreach($pigments as $pigment)
                        <div class="row">

                            <div class="col-lg-12">

                                <div class="ibox-content">
                                    <h3>Пигмент № {{ $pigment->id_photosynthetic_pigments_sample }}</h3>

                                    <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>

                                        <form method="GET">
                                            <tr>
                                                <td>Тропическая характеризация воды</td>
                                                <td>
                                                    <select name="id_trophic_characterization" class="form-control">
                                                        
                                                        <?php
                                                        if($pigment->id_trophic_characterization != null)
                                                        {
                                                            $query = pg_query($cnn, "SELECT * FROM trophic_characterization_of_water WHERE id_trophic_characterization = " . $pigment->id_trophic_characterization);
                                                            $row = pg_fetch_array($query);
                                                        ?>
                                                        <option  value="{{ $pigment->id_trophic_characterization }}">{{ $row['name'] }}</option>

                                                        <?php
                                                        $query1 = pg_query($cnn, 'SELECT * FROM trophic_characterization_of_water WHERE id_trophic_characterization != ' . $pigment->id_trophic_characterization);
                                                        while($row1 = pg_fetch_array($query1))
                                                        {
                                                        ?>
                                                        <option value="<?php echo $row1['id_trophic_characterization']; ?>"><?php echo $row1['name']; ?></option>
                                                        <?php
                                                        }
                                                        }
                                                        else
                                                        {
                                                        $query1 = pg_query($cnn, 'SELECT * FROM trophic_characterization_of_water');
                                                        ?>
                                                        <option  value="{{ $pigment->id_trophic_characterization }}">{{ $pigment->id_trophic_characterization }}</option>
                                                        <?php
                                                        while($row1 = pg_fetch_array($query1))
                                                        {
                                                        ?>
                                                        <option value="<?php echo $row1['id_trophic_characterization']; ?>"><?php echo $row1['id_trophic_characterization']; ?></option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>

                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Данные о горизонте</td>
                                                <td>
                                                    <select name="id_horizon" class="form-control">
                                                        
                                                        <?php
                                                        if($pigment->id_horizon != null)
                                                        {
                                                            $query = pg_query($cnn, "SELECT * FROM horizon_levels WHERE id_horizon = " . $pigment->id_horizon);
                                                            $row = pg_fetch_array($query);
                                                        ?>
                                                        <option  value="{{ $pigment->id_horizon }}">{{ $row['name'] }}</option>
                                                        <?php
                                                        $query1 = pg_query($cnn, 'SELECT * FROM horizon_levels WHERE id_horizon != ' . $pigment->id_horizon . ' and name IS NOT NULL');
                                                        while($row1 = pg_fetch_array($query1))
                                                        {
                                                        ?>
                                                        <option value="<?php echo $row1['id_horizon']; ?>"><?php echo $row1['name']; ?></option>
                                                        <?php
                                                        }
                                                        }
                                                        else
                                                        {
                                                        $query1 = pg_query($cnn, 'SELECT * FROM horizon_levels ');
                                                        while($row1 = pg_fetch_array($query1))
                                                        {
                                                        ?>
                                                        <option value="<?php echo $row1['id_horizon']; ?>"><?php echo $row1['id_horizon']; ?></option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                        
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Объём профильтрованной воды</td>
                                                <td><input type="text" name="volume_of_filtered_water" class="form-control" value="{{ $pigment->volume_of_filtered_water }}"></td>
                                            </tr>

                                            <tr>
                                                <td>Концентрация хлорофилла A</td>
                                                <td><input type="text" name="chlorophyll_a_concentration" class="form-control"  value="{{ $pigment->chlorophyll_a_concentration }}"></td>
                                            </tr>

                                            <tr>
                                                <td>Концентрация хлорофилла B</td>
                                                <td><input type="text" name="chlorophyll_b_concentration" class="form-control" value="{{ $pigment->chlorophyll_b_concentration }}"></td>
                                            </tr>

                                            <tr>
                                                <td>Концентрация хлорофилла C</td>
                                                <td><input type="text" name="chlorophyll_c_concentration" class="form-control" value="{{ $pigment->chlorophyll_c_concentration }}"></td>
                                            </tr>

                                            <tr>
                                                <td>Оптическая плотность</td>
                                                <td> <input disabled="" type="text" name="A" class="form-control" value="{{ $pigment->A }}" /></td>
                                            </tr>

                                            <tr>
                                                <td>Пигментный индекс</td>
                                                <td><input type="text" name="pigment_index" class="form-control" value="{{ $pigment->pigment_index }}"></td>
                                            </tr>

                                            <tr>
                                                <td>Феопигменты</td>
                                                <td><input type="text" name="pheopigments" class="form-control" value="{{ $pigment->pheopigments }}"></td>
                                            </tr>

                                            <tr>
                                                <td>Отношение хлорофила A / C</td>
                                                <td><input type="text" name="ratio_of_chl_a_to_chl_c" class="form-control" value="{{ $pigment->ratio_of_chl_a_to_chl_c }}"></td>
                                            </tr>

                                            <tr>
                                                <td>Комментарий</td>
                                                <td><textarea name="pigment_comment" style="resize: vertical;" class="form-control">{{ $pigment->comment }}</textarea></td>
                                            </tr>

                                            <tr>
                                                <td>Порядковый номер пробы</td>
                                                <td><input name="pigment_serial_number" type="text" class="form-control" value="{{ $pigment->serial_number }}"></td>
                                            </tr>

                                            <td>
                                                <input type="hidden" name="id_photosynthetic_pigments_sample" value="{{ $pigment->id_photosynthetic_pigments_sample }}">
                                                <input type="hidden" name="id_sample" value="{{ $pigment->id_sample }}">
                                                <input type="hidden" name="date" value="<?php if(isset($_GET['date'])) echo $_GET['date']; ?>">
                                                <input type="hidden" name="id_station" value="<?php if(isset($_GET['id_station']))  echo $_GET['id_station']; ?>">
                                                <input type="submit" class="form-control" name="updatePigment" value="Обновить">
                                                <input type="submit" class="form-control" name="deletePigment" value="Удалить"></br></br>
                                            </td>

                                        </form>
                                    </table>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
