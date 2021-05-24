<div class="jumbotron">
    <div class="row">
        <form action="<?php echo base_url();?>ads/find" method="post">
            <div class="col-md-3">
                <input type="text" name="search" placeholder="Search for ?" class="form-control">
            </div>
            <div class="col-md-4">
                <select  name="cat" class="form-control">
                    <option selected disabled>Choose a category</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Immobilier">Immobilier</option>
                    <option value="Jobs">Jobs</option>
                    <option value="Animals">Animals</option>
                    <option value="Divers">Divers</option>
                    <option value="Vehicules">Vehicules</option>
                </select>
            </div>
            <div class="col-md-4">
                <select  name="city" class="form-control">
                    <option selected disabled>Choose a city</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Rabat">Rabat</option>
                    <option value="Fes">Fes</option>
                    <option value="Taza">Taza</option>
                    <option value="Agadir">Agadir</option>
                    <option value="Tanger">Tanger</option>
                    <option value="Oujda">Oujda</option>
                    <option value="Meknes">Meknes</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
</div>