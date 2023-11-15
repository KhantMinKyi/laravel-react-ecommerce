import axios from "axios";
import React, { useEffect, useState } from "react";
import Loader from "../Components/Loader";
import { format } from "date-fns";
import { Link } from "react-router-dom";
function Order() {
    const [loader, setLoader] = useState(true);
    const [order, setOrder] = useState({});
    const [filterOrder, setfilterOrder] = useState({});
    const [page, setPage] = useState(1);
    const user_id = window.auth.id;
    useEffect(() => {
        axios
            .get(`/api/order-list?page=${page}&user_id=` + user_id)
            .then(({ data }) => {
                setOrder(data.data.data);
                setfilterOrder(data.data);
                setLoader(false);
            });
    }, [page]);
    // filter date
    const findDateAxios = () => {
        const date = document.getElementById("date").value;
        const formatDate = format(new Date(date), "yyyy-MM-dd");
        axios
            .get(
                `/api/order-list?page=${page}&user_id=${user_id}&date=${formatDate}`
            )
            .then(({ data }) => {
                setOrder(data.data.data);
                setfilterOrder(data.data);
                setLoader(false);
            });
    };
    return (
        <>
            {loader && <Loader />}
            {!loader && (
                <div className="col-sm col-md-8 offset-md-2">
                    <div className="cart mt-4">
                        <div className="cart-header bg-dark rounded-top pt-3 ps-3">
                            <div className="row">
                                <div className="col-md-6">
                                    <h5 className="text-white">Order List</h5>
                                </div>
                                <div className="col-md-6">
                                    <input
                                        type="date"
                                        className="btn btn-secondary"
                                        id="date"
                                    />
                                    <button
                                        className="btn btn-primary ms-2"
                                        onClick={() => findDateAxios()}
                                    >
                                        Find
                                    </button>
                                    <button
                                        onClick={() => window.location.reload()}
                                        className="btn btn-danger ms-2"
                                    >
                                        Clear
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div className="cart-body table-responsive">
                            <table className="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {order.map((d) => (
                                        <tr key={d.id}>
                                            <td>
                                                <img
                                                    src={d.product.img_url}
                                                    className="img-thumbnail"
                                                    style={{ width: 80 }}
                                                ></img>
                                            </td>
                                            <td>{d.product.name}</td>
                                            <td>{d.total_quantity}</td>
                                            <td>
                                                {d.product.sale_price *
                                                    d.total_quantity}{" "}
                                                Ks
                                            </td>
                                            <td>
                                                {format(
                                                    new Date(d.created_at),
                                                    "MM/dd/yyyy"
                                                )}
                                            </td>
                                            <td>
                                                {d.status === "pending" && (
                                                    <span className="badge bg-warning">
                                                        Pending
                                                    </span>
                                                )}
                                                {d.status === "success" && (
                                                    <span className="badge bg-primary">
                                                        Success
                                                    </span>
                                                )}
                                                {d.status === "cancle" && (
                                                    <span className="badge bg-danger">
                                                        Pending
                                                    </span>
                                                )}
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                            <div className="p-3 text-center">
                                <button
                                    className="btn btn-dark m-1"
                                    disabled={
                                        filterOrder.prev_page_url === null
                                            ? true
                                            : false
                                    }
                                    onClick={() => setPage(page - 1)}
                                >
                                    <i className="fa fa-arrow-left"></i>
                                </button>
                                <button
                                    className="btn btn-dark m-1"
                                    disabled={
                                        filterOrder.next_page_url === null
                                            ? true
                                            : false
                                    }
                                    onClick={() => setPage(page + 1)}
                                >
                                    <i className="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </>
    );
}

export default Order;
