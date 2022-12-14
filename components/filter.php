<div class="form-container">

<form class=" login-form"id="forma" action="" method="GET" >
    <h4>Choose your options</h4>
    <div class="form-group">
        <label for="f2">Month</label>

            <input type="text" name="month" class="fromto">
    </div>
    <div class="form-group">

        <label>With or without animals</label>
        <div>
            <select class="form-select" name="withAnimals">
                <option disabled selected value="0">Choose...</option>
                <option value="1">Without animals</option>
                <option value="2">With animals</option>
            </select>
        </div>
    </div>
    <div class="form-group ">
        <label >Distance</label>
        <div class="distance-range">
            <label>From</label>
            <input type="number" name="from" class="fromto">
            <label>To</label>
            <input type="number" name="to" class="fromto">
        </div>
    </div>
    <div class="form-group ">
        <label >Max people allowed</label>
        <div class="distance-range">
            <label>From</label>
            <input type="number" name="frompeople" class="fromto">
            <label>To</label>
            <input type="number" name="topeople" class="fromto">
        </div>
    </div>
    <div class="form-group">

        <label >Sort by</label>
        <div>
            <select class="form-select" name="sort">
                <option disabled selected value="0">Sort by...</option>
                <option value="1">Distance from lowest</option>
                <option value="2">Distance from highest</option>
                <option value="3">Max people allowed from lowest</option>
                <option value="4">Max people allowed from highest</option>
            </select>
        </div>
    </div>

            <button type="submit" name="filter" class="btn-save mt-3 ">Find</button>
        </form>

</div>
