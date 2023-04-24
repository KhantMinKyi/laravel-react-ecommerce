import React from "react";

function RelatedProduct({ relatedProducts }) {
    return (
        <div className="row mt-5">
            <h5>Related Products</h5>
            {relatedProducts.map((d) => (
                <div className="col-sm col-md-6 col-lg-3" key={d.slug}>
                    <a href={`/product/${d.slug}`}>
                        <div className="card border">
                            <div className="card-header text-center">
                                <img
                                    src={d.img_url}
                                    className="img mt-2"
                                    width={150}
                                />
                            </div>
                            <hr className="horizontal dark" />
                            <div className="card-body ps-6">
                                <p>
                                    Price :{" "}
                                    <b className="text-dark">
                                        {d.sale_price} Ks
                                    </b>{" "}
                                </p>
                                <p>
                                    Name : <b className="text-dark">{d.name}</b>{" "}
                                </p>
                                <p>
                                    Category :{" "}
                                    <b className="text-dark">
                                        {" "}
                                        {d.category.name}
                                    </b>{" "}
                                </p>
                                <p>
                                    Brand :{" "}
                                    <b className="text-dark">{d.brand.name} </b>{" "}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            ))}
        </div>
    );
}

export default RelatedProduct;
