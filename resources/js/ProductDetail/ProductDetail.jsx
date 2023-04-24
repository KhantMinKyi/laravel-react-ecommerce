import React, { useEffect, useState } from "react";
import Description from "./Component/Description";
import Category from "./Component/Category";
import RelatedProduct from "./Component/RelatedProduct";
import Brand from "./Component/Brand";
import WriteReview from "./Component/WriteReview";
import axios from "axios";
import Loader from "../Components/Loader";
import SmallLoader from "../Components/SmallLoader";

export default function ProductDetail() {
    const [product, setProduct] = useState({});
    const [category, setCategory] = useState([]);
    const [relatedProducts, setRelatedProducts] = useState([]);
    const [brands, setBrands] = useState([]);
    const [color, setColor] = useState("");
    const [loader, setLoader] = useState(true);
    const [cartloader, setCartLoader] = useState(false);
    const product_slug = window.product_slug;
    // fretch Product
    const fetchProduct = () => {
        axios.get("/api/product/" + product_slug).then((d) => {
            const { product, category, relatedProducts, brands } = d.data.data;
            setProduct(product);
            setCategory(category);
            setRelatedProducts(relatedProducts);
            setBrands(brands);
            setLoader(false);
        });
    };
    // Add To Cart
    const addToCart = () => {
        setCartLoader(true);
        const user_id = window.auth.id;
        axios
            .post("/api/add-to-cart/" + product_slug, { user_id, color })
            .then((d) => {
                const { data } = d;
                if (data.false) {
                    setLoader(false);
                    showToast("Product Not Found");
                } else {
                    window.updateCart(data.data);
                    setCartLoader(false);
                    showToast("Product Added To Cart");
                }
            });
    };
    console.log(color);
    // fretch product useEffect
    useEffect(() => {
        fetchProduct();
    }, []);
    return (
        <div>
            {loader && <Loader />}
            {!loader && (
                <div>
                    {/* Detail Product  */}
                    <div className="row mt-5">
                        {/* Description  */}
                        <Description description={product.description} />
                        {/* Main Product  */}
                        <div className="col-md-7 col-lg-6">
                            <div className="container border rounded">
                                {/* Title  */}
                                <div className=" p-2 mt-2">
                                    <h5>{product.name}</h5>
                                    <span>Category - </span>
                                    <span>{product.category.name}</span>
                                </div>
                                {/* Image And About  */}
                                <div className="row">
                                    <div className="col-lg-6 col-sm-12 col-md-12">
                                        <img
                                            className="m-2 rounded"
                                            src={product.img_url}
                                            style={{ width: "250px" }}
                                        />
                                    </div>
                                    <div className="col-lg-6 col-sm-12 col-md-12">
                                        <div className="mt-2">
                                            <span>Price : </span>
                                            <del className="text-danger">
                                                {product.discount_price} Ks
                                            </del>
                                            <b className="text-dark">
                                                {" "}
                                                {product.sale_price} Ks
                                            </b>
                                        </div>
                                        <div>
                                            <span>Instoke : </span>
                                            <span className="btn btn-md btn-outline-primary mt-2">
                                                {product.total_quantity} Items
                                            </span>
                                        </div>
                                        <div>
                                            <span>Brand : </span>
                                            <b className="text-dark mt-2">
                                                {product.brand.name}
                                            </b>
                                        </div>
                                        <div className="my-2">
                                            <span>Avilible Color : </span>
                                            {product.color.map((d) => (
                                                <div
                                                    className="d-inline btn m-1"
                                                    style={{
                                                        height: "20px",
                                                        backgroundColor: d.name,
                                                    }}
                                                    key={d.id}
                                                ></div>
                                            ))}
                                        </div>
                                        <div className="my-4">
                                            <b>Description : </b>
                                            <span
                                                dangerouslySetInnerHTML={{
                                                    __html: product.description,
                                                }}
                                            ></span>
                                        </div>
                                        <div className="my-2">
                                            <span>Choose Color : </span>
                                            <select
                                                name="color"
                                                className="btn btn-dark "
                                                onChange={(e) =>
                                                    setColor(e.target.value)
                                                }
                                            >
                                                <option value="">Color</option>
                                                {product.color.map((d) => (
                                                    <option
                                                        key={d.slug}
                                                        value={d.slug}
                                                    >
                                                        {d.name}
                                                    </option>
                                                ))}
                                            </select>
                                        </div>

                                        <div className="my-4">
                                            <button
                                                className="btn btn-primary"
                                                onClick={() => addToCart()}
                                                disabled={
                                                    window.auth
                                                        ? cartloader
                                                        : true
                                                }
                                            >
                                                {cartloader && <SmallLoader />}
                                                Add To Cart
                                            </button>
                                        </div>
                                    </div>
                                    <hr className="horizontal dark" />
                                </div>
                            </div>
                        </div>
                        {/* Category  */}
                        <Category category={category} />
                    </div>
                    {/* related Product  */}
                    <RelatedProduct relatedProducts={relatedProducts} />
                    <hr className="horizontal dark" />
                    <div className="row">
                        {/* Brands  */}
                        <Brand brands={brands} />
                    </div>
                    <hr className="horizontal dark" />

                    {/* Write Reviews  */}

                    <WriteReview review={product.review} />
                </div>
            )}
        </div>
    );
}
