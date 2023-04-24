import React, { useEffect, useState } from "react";
import Loader from "../Components/Loader";
import axios from "axios";
import SmallLoader from "../Components/SmallLoader";

function Cart() {
    const [loader, setLoader] = useState(true);
    const [smallLoader, setSmallLoader] = useState(false);
    const [deleteLoader, setDeleteLoader] = useState(false);
    const [checkoutLoader, setCheckoutLoader] = useState(false);
    const [cart, setCart] = useState([]);
    const user_id = window.auth.id;
    useEffect(() => {
        axios.get("/api/product-cart?user_id=" + user_id).then((d) => {
            const { data } = d;
            if (data.false) {
                setLoader(false);
                showToast("Product Not Found");
            } else {
                setCart(data.data);
                setLoader(false);
            }
        });
    }, []);
    // Update Cart + and -
    const updateCart = (id, type) => {
        const updatedCart = cart.map((d) => {
            if (d.id === id) {
                switch (type) {
                    case "add":
                        d.total_quantity += 1;
                        break;
                    case "reduce":
                        d.total_quantity -= 1;
                        break;
                    default:
                        break;
                }
            }
            return d;
        });
        setCart(updatedCart);
    };
    // Save Updated Cart
    const updateQty = (id, qty) => {
        setSmallLoader(id);
        axios
            .post("/api/update-cart", { card_id: id, total_quantity: qty })
            .then((d) => {
                if (d.data.message) {
                    showToast("Cart Updated Successfully!");
                    setSmallLoader(false);
                }
            });
    };
    // Delete / Remove Cart
    const deleteCart = (id) => {
        setDeleteLoader(id);
        const user_id = window.auth.id;
        axios
            .post("/api/remove-cart", { card_id: id, user_id: user_id })
            .then((d) => {
                if (d.data.message) {
                    setCart((preCart) => preCart.filter((d) => d.id !== id));
                    showToast("Cart Deleted Successfully!");
                    setDeleteLoader(false);
                    window.updateCart(d.data.data);
                }
            });
    };
    // Calculate Total Quantity
    const TotalQuantity = () => {
        var total_price = 0;
        cart.map((d) => {
            total_price += d.total_quantity * d.product.sale_price;
        });
        return (
            <span>
                <b>{total_price} </b>Ks
            </span>
        );
    };
    // checkout
    const checkout = () => {
        setCheckoutLoader(true);
        const user_id = window.auth.id;
        axios.post("/api/checkout?user_id=" + user_id).then((d) => {
            if (d.data.message === false) {
                showToast("Cart Not Found");
                setCheckoutLoader(false);
            } else {
                showToast(
                    "Order Successful! Please Wait For Admin To Confirm Order"
                );
                setCart([]);
                window.updateCart(0);
                setCheckoutLoader(false);
            }
        });
    };
    return (
        <div className="container">
            {loader && <Loader />}
            {!loader && (
                <>
                    {/* Product Cart */}
                    <div className="card mt-4 mb-4">
                        <div className="card-header bg-dark ">
                            <h5 className="text-white"> Your Cart</h5>
                        </div>
                        <div className="card-body table-responsive ">
                            <table className="table table-sm   table-striped ">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Color</th>
                                        <th>Add/Remove</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {cart.map((d) => (
                                        <tr key={d.id}>
                                            <td>
                                                <img
                                                    src={d.product.img_url}
                                                    style={{ width: 80 }}
                                                ></img>
                                            </td>
                                            <td>{d.product.name}</td>
                                            <td>
                                                <div
                                                    className="d-inline btn "
                                                    style={{
                                                        backgroundColor:
                                                            d.color,
                                                    }}
                                                ></div>
                                            </td>

                                            <td>
                                                <button
                                                    className="btn btn-dark btn-sm p-2 px-3 m-2"
                                                    onClick={() =>
                                                        updateCart(
                                                            d.id,
                                                            "reduce"
                                                        )
                                                    }
                                                >
                                                    -
                                                </button>
                                                <input
                                                    type="text"
                                                    className="btn btn-sm btn-outline-dark "
                                                    disabled
                                                    style={{
                                                        width: 80,
                                                        marginBottom: 0,
                                                    }}
                                                    value={d.total_quantity}
                                                />
                                                <button
                                                    className="btn btn-primary btn-sm p-2 px-3 m-2"
                                                    onClick={() =>
                                                        updateCart(d.id, "add")
                                                    }
                                                >
                                                    +
                                                </button>
                                                <button
                                                    className="btn btn-success btn-sm p-2 px-3 m-2"
                                                    onClick={() =>
                                                        updateQty(
                                                            d.id,
                                                            d.total_quantity
                                                        )
                                                    }
                                                    disabled={
                                                        smallLoader === d.id
                                                    }
                                                >
                                                    {smallLoader === d.id && (
                                                        <SmallLoader />
                                                    )}
                                                    Save
                                                </button>
                                            </td>
                                            <td>
                                                {d.product.sale_price *
                                                    d.total_quantity}{" "}
                                                Ks
                                            </td>
                                            <td>
                                                <button
                                                    className="btn btn-danger"
                                                    onClick={() =>
                                                        deleteCart(d.id)
                                                    }
                                                    disabled={
                                                        deleteLoader === d.id
                                                    }
                                                >
                                                    {deleteLoader === d.id && (
                                                        <SmallLoader />
                                                    )}
                                                    <i className=" fa fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                    <tr>
                                        <td colSpan={2}></td>
                                        <td>
                                            <span>Total Price :</span>
                                        </td>
                                        <td>
                                            <TotalQuantity />{" "}
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {/* Check Out */}
                    <div className="card mt-4 mb-4">
                        <div className="card-header bg-dark ">
                            <h5 className="text-white">Check out </h5>
                        </div>
                        <div className="card-body table-responsive ">
                            <table className="table table-striped ">
                                <thead className="bg-secondary text-white ">
                                    <tr>
                                        <th></th>
                                        <th>Customer Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Customer Name :</td>
                                        <td>{window.auth.name}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number :</td>
                                        <td>{window.auth.phone}</td>
                                    </tr>
                                    <tr>
                                        <td>Customer NRC :</td>
                                        <td>{window.auth.nrc}</td>
                                    </tr>
                                    <tr>
                                        <td>Customer Email</td>
                                        <td>{window.auth.email}</td>
                                    </tr>
                                    <tr>
                                        <td>Customer Address</td>
                                        <td>{window.auth.address}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button
                                                className="btn btn-primary"
                                                onClick={() => checkout()}
                                                disabled={checkoutLoader}
                                            >
                                                {checkoutLoader && (
                                                    <SmallLoader />
                                                )}
                                                Check Out
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </>
            )}
        </div>
    );
}

export default Cart;
