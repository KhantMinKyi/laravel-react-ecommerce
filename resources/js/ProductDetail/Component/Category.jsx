import React from "react";

function Category({ category }) {
    return (
        <div className="col-md-5 col-lg-3">
            <div className="row border rounded">
                <div className="text-center bg-dark rounded-top">
                    <h6 className="text-white p-3">All Categories</h6>
                </div>
                {category.map((d) => (
                    <React.Fragment key={d.slug}>
                        <div className="col-sm-9">
                            <a href={`/products?category=${d.slug}`}>
                                <img
                                    src={d.img_url}
                                    className="avatar avatar-md m-2"
                                />
                                <b>{d.name}</b>
                            </a>
                        </div>

                        <div className="col-sm-3">
                            <span className="btn btn-dark m-2 p-2">
                                {d.product_count}
                            </span>
                        </div>
                        <hr className="horizontal dark" />
                    </React.Fragment>
                ))}
            </div>
        </div>
    );
}

export default Category;
