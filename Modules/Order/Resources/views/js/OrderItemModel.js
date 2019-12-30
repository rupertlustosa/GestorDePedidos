class OrderItemModel {

    constructor(id = null, order_id = null, order_status_id = null, product_variation_id = null, parent_id = null, quantity = null, original_price = null, price = null, total = null) {
        this.id = id;
        this.order_id = order_id;
        this.order_status_id = order_status_id;
        this.product_variation_id = product_variation_id;
        this.parent_id = parent_id;
        this.quantity = quantity;
        this.original_price = original_price;
        this.price = price;
        this.total = total;
    }
}

export default OrderItemModel;
