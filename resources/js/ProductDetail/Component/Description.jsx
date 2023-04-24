import React from "react";

function Description({ description }) {
    return (
        <div className="col-md-12 col-lg-3">
            <h6>About Product </h6>
            <p
                dangerouslySetInnerHTML={{
                    __html: description,
                }}
            ></p>
            <hr className="horizontal dark" />
        </div>
    );
}

export default Description;
