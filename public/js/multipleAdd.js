

let addMoreProductsBtn = document.getElementById('addMoreProducts');
let productsForm = document.getElementById('formProducts');

addMoreProductsBtn.addEventListener('click', showForm);

function showForm(e) {
    // cancel the event of the button that send form information
    e.preventDefault();

    const newform = document.createElement('div');


    newform.innerHTML = `
    <label class="mt-5  ">Product Reference</label>
    <div>
        <input type="file" name="reference[]" class="form-control <?php echo (!empty($data['reference_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['reference'];?>">
        <span><?php echo $data['reference_err'];?></span>
    </div>
    <label class="pt-4">Product Name</label>
    <div>

        <input type="text" name="label[]" class="form-control <?php echo (!empty($data['label_err'])) ? 'is-invalid' : ''; ?>">
        <span><?php echo $data['label_err'];?></span>
    </div>
    <label class="pt-4">Retail Price</label>
    <div>

        <input type="number" step="any" name="retail_price[]" class="form-control <?php echo (!empty($data['retail_price_err'])) ? 'is-invalid' : ''; ?>" >
        <span><?php echo $data['retail_price_err'];?></span>
    </div>
    <label class="pt-4">Final Price</label>
    <div>

        <input type="number" step="any" name="final_price[]" class="form-control <?php echo (!empty($data['final_price_err'])) ? 'is-invalid' : ''; ?>" >
        <span><?php echo $data['final_price_err'];?></span>
    </div>
    <label class="pt-4">Selling Price</label>
    <div>

        <input type="number" step="any" name="selling_price[]" class="form-control <?php echo (!empty($data['selling_price_err'])) ? 'is-invalid' : ''; ?>" >
        <span><?php echo $data['selling_price_err'];?></span>
    </div>
    <label class="pt-4">Description</label>
    <div>

        <textarea name="description[]" class="form-control <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" ></textarea>
        <span><?php echo $data['description_err'];?></span>
    </div>
    <label class="pt-4">Product Category</label>
    <div>
        <select class="form-select" aria-label="Default select example" name="category[]">
        <?php foreach($data['categories'] as $categories): ?>
        <option value="<?php echo $categories->id; ?>"><?php echo $categories->name;?></option>
        <?php endforeach ;?>

    </select></div>`;

    
    productsForm.insertBefore(newform,productsForm.lastElementChild);
}

