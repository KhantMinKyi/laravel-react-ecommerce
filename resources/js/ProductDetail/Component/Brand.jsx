import React from "react";

function Brand({ brands }) {
    return (
        <div className="col-sm  col-md-12 col-lg-12">
            <div className="row border rounded">
                <div className="text-center bg-dark rounded-top">
                    <h6 className="text-white p-3">Other Brands Lists</h6>
                </div>
                {brands.map((d) => (
                    <React.Fragment key={d.id}>
                        <div className="col-sm-9 p-2 ps-4">
                            <b>{d.name}</b>
                        </div>
                        <div className="col-sm-3">
                            <span className="btn btn-dark m-2 p-2">
                                {d.product_count} Items
                            </span>
                        </div>
                        <hr className="horizontal dark" />
                    </React.Fragment>
                ))}
            </div>
        </div>
    );
}

export default Brand;
