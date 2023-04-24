import React, { Fragment, useEffect, useState } from "react";
import Loader from "../Components/Loader";
function Contact() {
    const [loader, setLoader] = useState(true);
    useEffect(() => {
        setTimeout(() => {
            setLoader(false);
        }, 1000);
    }, []);

    return (
        <Fragment>
            {loader && <Loader />}
            {!loader && (
                <div className="page-header min-vh-100 mt-4">
                    <div className="container">
                        <div className="row">
                            <div className="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                                <div className="card card-plain">
                                    <div className="card-header pb-0 text-start">
                                        <h4 className="font-weight-bolder">
                                            Make A FeedBack Message
                                        </h4>
                                        <p className="mb-0">
                                            Contact and Keep intouch with Us!
                                        </p>
                                    </div>
                                    <div className="card-body">
                                        <form
                                            role="form"
                                            action
                                            method="POST"
                                            encType="multipart/form-data"
                                        >
                                            <div className="mb-3">
                                                <label>Full Name</label>
                                                <input
                                                    type="text"
                                                    className="form-control form-control-lg"
                                                    placeholder="Name"
                                                    aria-label="Name"
                                                    name="name"
                                                />
                                            </div>
                                            <div className="mb-3">
                                                <label>Email</label>
                                                <p className="text-sm">
                                                    We Will reply a Message to
                                                    this Email address
                                                </p>
                                                <input
                                                    type="text"
                                                    className="form-control form-control-lg"
                                                    placeholder="Email"
                                                    aria-label="Email"
                                                    name="email"
                                                />
                                            </div>
                                            <div className="mb-3">
                                                <label>Description</label>
                                                <textarea
                                                    type="text"
                                                    className="form-control form-control-lg"
                                                    placeholder="Description"
                                                    aria-label="Description"
                                                    name="description"
                                                ></textarea>
                                            </div>
                                            <div className="text-center">
                                                <button
                                                    type="submit"
                                                    className="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
                                                    disabled={
                                                        window.auth
                                                            ? false
                                                            : true
                                                    }
                                                >
                                                    Send{" "}
                                                    <i className="fa fa-paper-plane text-md ms-2"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div className="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p className="mb-4 text-sm mx-auto">
                                            Don't You have an Account?
                                            <a
                                                href="#"
                                                className="text-primary text-gradient font-weight-bold"
                                            >
                                                Sign up
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute  top-0 end-0 text-center justify-content-center flex-column">
                                <div
                                    className="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                    style={{
                                        backgroundImage:
                                            'url("../assets/img/background-2.jpg")',
                                        backgroundSize: "cover",
                                    }}
                                >
                                    <span className="mask bg-gradient-dark opacity-6" />
                                    <h4 className="mt-5 text-white font-weight-bolder position-relative">
                                        "Contact Us For More Detail"
                                    </h4>
                                    <p className="text-white position-relative">
                                        You Can report error or bug of our
                                        Website . You can also send feed back to
                                        out products or por services . We Are
                                        Warmly Welcome To Your Advices.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </Fragment>
    );
}

export default Contact;
