class OrderModel {

    /*constructor(id = null, attendant_id = null, client_id = null, deliveryman_id = null, order_type_id = null, order_status_id = null, order_point_id = null, notes = null, start_date = null, output_to_delivery_date = null, end_date = null, items = []) {
        this.id = id;
        this.attendant_id = attendant_id;
        this.client_id = client_id;
        this.deliveryman_id = deliveryman_id;
        this.order_type_id = order_type_id;
        this.order_status_id = order_status_id;
        this.order_point_id = order_point_id;
        this.notes = notes;
        this.start_date = start_date;
        this.output_to_delivery_date = output_to_delivery_date;
        this.end_date = end_date;
        this.items = items;
    }*/
    constructor() {
        this.id = null;
        this.attendant_id = null;
        this.client_id = null;
        this.deliveryman_id = null;
        this.order_type_id = null;
        this.order_status_id = null;
        this.order_point_id = null;
        this.notes = null;
        this.start_date = null;
        this.output_to_delivery_date = null;
        this.end_date = null;
        this.items = [];
    }
}

export default OrderModel;
