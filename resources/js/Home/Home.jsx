import React, { useEffect, useState } from "react";
import Loader from "../Components/Loader";
import axios from "axios";

export default function Home() {
    const [category, setCategory] = useState([]);
    const [products, setProducts] = useState([]);
    const [brands, setBrands] = useState([]);
    const [discountProduct, setDiscountProduct] = useState([]);
    const [productByCategories, setProductByCategories] = useState([]);
    const [randomProduct, setRandomProduct] = useState([]);
    const [loader, setLoader] = useState(true);

    const fetchProduct = () => {
        axios.get("/api/home").then((d) => {
            const {
                category,
                products,
                brands,
                discountProduct,
                productByCategories,
                randomProduct,
            } = d.data.data;
            setCategory(category);
            setProducts(products);
            setBrands(brands);
            setProductByCategories(productByCategories);
            setRandomProduct(randomProduct);
            setDiscountProduct(discountProduct);
            setLoader(false);
        });
    };
    useEffect(() => {
        fetchProduct();
    }, []);
    return (
        <div className="container">
            {loader && <Loader />}
            {!loader && (
                <React.Fragment>
                    {/* Category Body */}
                    <div className="card mt-4 mx-4 p-4 shadow-none ">
                        <div className="thumbnail">
                            <h4 className="text-primary">
                                Top Popluar Categories
                            </h4>
                            <div className="d-flex flex-row-reverse">
                                <a href="/products" className="btn btn-dark ">
                                    See All Categories
                                </a>
                            </div>
                            <hr className="horizontal dark" />
                        </div>
                        {/* Category Loop Items */}
                        <div className="row text-center">
                            {category.map((d) => (
                                <div
                                    className=" col-lg-3 col-md-4 col-sm-12"
                                    key={d.slug}
                                >
                                    <a href={`/products?category=${d.slug}`}>
                                        <div className="row border rounded p-1 m-1">
                                            <div className="col-lg-6 col-md-12 col-sm-6">
                                                <img
                                                    src={d.img_url}
                                                    style={{
                                                        height: "100px",
                                                    }}
                                                    className="rounded"
                                                />
                                            </div>
                                            <div className="col-lg-6 col-md-12 col-sm-6">
                                                <b>
                                                    {window.locale === "mm"
                                                        ? d.mm_name
                                                        : d.name}
                                                </b>
                                                <p>{d.product_count} items</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            ))}
                        </div>

                        <hr className="horizontal dark" />
                    </div>
                    {/* Top Sale And Discound Row */}
                    <div className="row">
                        {/* Top Sale */}
                        <div className="col-md-9 col-sm ">
                            <h4 className="text-dark text-center">
                                {" "}
                                Top Sale Items
                            </h4>
                            <hr className="horizontal dark" />
                            <div className="d-flex flex-row-reverse">
                                <a
                                    href="/products"
                                    className="btn btn-primary ms-4 "
                                >
                                    View All Top Sale
                                </a>
                            </div>
                            <div className="row text-center ms-4">
                                {/* Top Sale Products Loops */}
                                {randomProduct.map((d) => (
                                    <div
                                        className="col-md-6 col-lg-3"
                                        key={d.slug}
                                    >
                                        <a href={`/product/${d.slug}`}>
                                            <div className=" border rounded mb-4">
                                                <img
                                                    src={d.img_url}
                                                    style={{ height: "180px" }}
                                                    className="rounded col-md-12 col-sm-12"
                                                />
                                                <div className="mt-2">
                                                    <span>Price : </span>
                                                    <b>{d.sale_price} Ks !</b>
                                                </div>
                                                <div className="mt-2">
                                                    <b>{d.name}</b>
                                                    <p>
                                                        {d.total_quantity} items
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                ))}
                            </div>
                        </div>
                        {/*  Discound */}
                        <div className="col-md-3 col-sm border rounded">
                            <div className="row">
                                <h4 className="text-center text-danger pt-2">
                                    Big Discount!
                                </h4>
                                <hr className="horizontal dark" />
                            </div>
                            {/* Discount Items Loop */}
                            {discountProduct.map((d) => (
                                <div className="row" key={d.slug}>
                                    <a href={`/product/${d.slug}`}>
                                        <div className="text-end ">
                                            <h6>
                                                <del className="text-danger">
                                                    {" "}
                                                    {d.discount_price} Ks
                                                </del>
                                                {d.sale_price}
                                                Ks!
                                            </h6>
                                        </div>
                                        <div className="col-sm col-md-12">
                                            <img
                                                src={d.img_url}
                                                style={{ height: "180px" }}
                                                className="rounded col-md-12 "
                                            />
                                        </div>
                                        <div className=" text-center  ">
                                            <b>{d.category.name}</b>
                                            <p>
                                                Only <b>{d.total_quantity} </b>
                                                items remain!
                                            </p>
                                        </div>
                                        <hr className="horizontal dark" />
                                    </a>
                                </div>
                            ))}
                        </div>
                        <hr className="horizontal dark" />
                    </div>
                    {/* Brands And Items */}
                    <div className="row">
                        {/* Brands  */}
                        <div className="col-sm-12 col-md-3 border pt-2 ps-4">
                            <div className="card ">
                                <div className="card-header bg-primary mb-3">
                                    <h6 className="text-white">Brands</h6>
                                </div>
                                <ul>
                                    <li className="list-group-item ">
                                        {brands.map((d) => (
                                            <a
                                                href={`/products?brand=${d.slug}`}
                                            >
                                                <div className="row my-2">
                                                    <div className="col-9 col-sm-6 col-md-9">
                                                        <span className="ms-2 ">
                                                            {d.name}
                                                        </span>
                                                    </div>
                                                    <hr className="horizontal dark mt-2" />
                                                </div>
                                            </a>
                                        ))}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {/* All Items */}
                        <div className="col-sm-12 col-md-9 ">
                            <h6 className="text-secondary">All Products</h6>
                            <hr className="horizontal dark" />
                            <div className="row">
                                {/* All Product Loop */}
                                {products.data.map((d) => (
                                    <div
                                        className="col-lg-3 col-md-4 col-sm-12"
                                        key={d.slug}
                                    >
                                        <a href={`/product/${d.slug}`}>
                                            <div className="row border-end border-bottom">
                                                <div className="col-sm col-md-12">
                                                    <p className="text-primary p-1">
                                                        {d.category.name} /
                                                        <b className="text-dark">
                                                            {d.brand.name}
                                                        </b>
                                                    </p>
                                                    <img
                                                        src={d.img_url}
                                                        style={{
                                                            height: "180px",
                                                        }}
                                                        className="rounded col-md-12 "
                                                    />
                                                </div>
                                                <div className=" text-center  ">
                                                    <b>{d.name}</b>

                                                    <p>
                                                        <b className="text-dark">
                                                            {d.sale_price} Ks
                                                        </b>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </React.Fragment>
            )}
        </div>
    );
}
