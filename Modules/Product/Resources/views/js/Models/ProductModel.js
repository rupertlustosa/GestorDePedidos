import VariationModel from './VariationModel';

class ProductModel {

    constructor() {
        this.id = null;
        this.category_id = null;
        this.name = null;
        this.image = null;
        this.notes = null;
        this.variations = [new VariationModel()];
    }
}
 export default ProductModel;
