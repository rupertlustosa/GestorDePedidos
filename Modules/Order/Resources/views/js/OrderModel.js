class OrderModel {
    id;
    attendant_id;
    client_id;
    deliveryman_id;
    order_type_id;
    order_status_id;
    order_point_id;
    notes;
    start_date;
    output_to_delivery_date;
    end_date;

    constructor(id, attendant_id, client_id, deliveryman_id, order_type_id, order_status_id, order_point_id, notes, start_date, output_to_delivery_date, end_date) {
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
    }
}
