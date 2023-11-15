import React, { useEffect, useState } from "react";
import Loader from "../Components/Loader";
function About() {
    const [loader, setLoader] = useState(true);
    useEffect(() => {
        setTimeout(() => {
            setLoader(false);
        }, 1000);
    }, []);
    return (
        <React.Fragment>
            {loader && <Loader />}
            {!loader && (
                <div>
                    <div className="container mb-4">
                        {/* Intro */}
                        <div className="row mt-4 ">
                            <div className="col-sm-12 col-md-6 p-4">
                                <h4 className="p-2 text-dark">
                                    {window.locale === "en"
                                        ? "Your Brand New Local Ecommerce"
                                        : "သင့်ဒေသခံ Ecommance site အသစ်"}
                                </h4>
                                <span>
                                    {window.locale === "en"
                                        ? "Welcome to Area's Shoppy, where shopping meets convenience and style! At Area's Shoppy, we believe in the power of seamless online shopping experiences. Our journey began with a simple yet powerful vision: to create a platform that not only offers a diverse range of products but also redefines the way you shop online."
                                        : "ဈေးဝယ်ရာတွင် အဆင်ပြေပြီး စတိုင်လ်ကျသော စျေးဝယ်ခြင်းမှ ကြိုဆိုပါသည်။ Area's Shoppy တွင်၊ ချောမွေ့သောအွန်လိုင်းစျေးဝယ်အတွေ့အကြုံများ၏စွမ်းအားကို ကျွန်ုပ်တို့ယုံကြည်ပါသည်။ ကျွန်ုပ်တို့၏ခရီးသည် ရိုးရှင်းသော်လည်း အားကောင်းသည့်အမြင်ဖြင့် စတင်ခဲ့သည်- ထုတ်ကုန်မျိုးစုံကို ပေးစွမ်းရုံသာမက သင်အွန်လိုင်းတွင် စျေးဝယ်ပုံကိုလည်း ပြန်လည်သတ်မှတ်ပေးသည့် ပလပ်ဖောင်းတစ်ခုကို ဖန်တီးရန်။"}
                                </span>
                            </div>
                            <div className="col-sm-12 col-md-5 mt-4">
                                <img
                                    src="../assets/img/about-us.jpg"
                                    style={{
                                        height: "50vh",
                                        filter: "blur(1px)",
                                    }}
                                ></img>
                            </div>
                        </div>
                        <hr className="horizontal dark" />
                        {/* Who we are */}
                        <div className="row">
                            <div className="col-sm-12 col-md-4">
                                <div className="card p-2">
                                    <i className="fa fa-check d-flex flex-row-reverse m-2 text-primary"></i>
                                    <div className="card-header text-center text-dark">
                                        <span className="text-lg font-weight-bold">
                                            Who We Are
                                        </span>
                                        <i className="fa fa-user mx-2 mt-1"></i>
                                    </div>
                                    <div className="card-body">
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>Local Base Shop</span>
                                        </div>
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>From Yangon</span>
                                        </div>
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>Started From 2020</span>
                                        </div>
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>More Trusty</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-sm-12 col-md-4">
                                <div className="card p-2">
                                    <i className="fa fa-check d-flex flex-row-reverse m-2 text-primary"></i>
                                    <div className="card-header text-center text-dark">
                                        <span className="text-lg font-weight-bold">
                                            What We Do
                                        </span>
                                        <i className="fa fa-user mx-2 mt-1"></i>
                                    </div>
                                    <div className="card-body">
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>Local Base Shop</span>
                                        </div>
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>From Yangon</span>
                                        </div>
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>Started From 2020</span>
                                        </div>
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>More Trusty</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-sm-12 col-md-4">
                                <div className="card p-2">
                                    <i className="fa fa-check d-flex flex-row-reverse m-2 text-primary"></i>
                                    <div className="card-header text-center text-dark">
                                        <span className="text-lg font-weight-bold">
                                            Our Mission
                                        </span>
                                        <i className="fa fa-user mx-2 mt-1"></i>
                                    </div>
                                    <div className="card-body">
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>Local Base Shop</span>
                                        </div>
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>From Yangon</span>
                                        </div>
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>Started From 2020</span>
                                        </div>
                                        <div className="d-flex align-items-center justify-content-center my-4">
                                            <span>More Trusty</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* our goal with photo */}
                    <div className="bg-dark text-white mb-4">
                        <div className="d-inline-block w-50 p-4">
                            <h4 className="text-white">Our Goal</h4>
                            <small>
                                Lorem Ipsum is simply dummy text of the printing
                                and typesetting industry.{" "}
                            </small>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing
                                and typesetting industry.{" "}
                            </p>
                        </div>
                        <div className="d-inline-block w-50 p-4">
                            <img
                                src="../assets/img/about-us2.jpg"
                                style={{
                                    height: "50vh",
                                }}
                            ></img>
                        </div>
                    </div>
                    {/* 4 col / count */}
                    <div className="container my-2">
                        <div className="row">
                            <div className="col-sm-6 col-md-3 mb-4">
                                <div
                                    className="card p-2 "
                                    style={{ height: "170px" }}
                                >
                                    <div className="card-body text-center text-dark d-flex align-items-center justify-content-center">
                                        <span className="text-lg font-weight-bold">
                                            <b>1000+</b> Products
                                        </span>
                                        <i className="fa fa-boxes text-lg ms-4 mt-1 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div className="col-sm-6 col-md-3 mb-4">
                                <div
                                    className="card p-2 "
                                    style={{ height: "170px" }}
                                >
                                    <div className="card-body text-center text-dark d-flex align-items-center justify-content-center">
                                        <span className="text-lg font-weight-bold">
                                            <b>50+</b> Suppliers
                                        </span>
                                        <i className="fa fa-box text-lg ms-4 mt-1 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div className="col-sm-6 col-md-3 mb-4">
                                <div
                                    className="card p-2 "
                                    style={{ height: "170px" }}
                                >
                                    <div className="card-body text-center text-dark d-flex align-items-center justify-content-center">
                                        <span className="text-lg font-weight-bold">
                                            <b>250+</b> Customers
                                        </span>
                                        <i className="fa fa-users text-lg ms-4 mt-1 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div className="col-sm-6 col-md-3 mb-4">
                                <div
                                    className="card p-2 "
                                    style={{ height: "170px" }}
                                >
                                    <div className="card-body text-center text-dark d-flex align-items-center justify-content-center">
                                        <span className="text-lg font-weight-bold">
                                            <b>4</b> Best Awards
                                        </span>
                                        <i className="fa fa-award text-lg ms-4 mt-1 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* local contact */}
                    <div
                        className=" text-white mb-4"
                        style={{ backgroundColor: "#B3C26C" }}
                    >
                        <div className="d-inline-block w-50 ">
                            <img
                                src="../assets/img/about-us.jpg"
                                style={{
                                    height: "50vh",
                                }}
                            ></img>
                        </div>
                        <div className="d-inline-block w-50 p-4 align-middle">
                            <h4 className="text-white mb-4">
                                Your Trusty Local Best Shoppy
                            </h4>
                            <small>
                                Lorem Ipsum is simply dummy text of the printing
                                and typesetting industry.{" "}
                            </small>
                            <p className="mt-4">
                                Lorem Ipsum is simply{" "}
                                <i className="fa fa-phone mx-4"></i>
                            </p>
                            <p>
                                Lorem Ipsum is simply{" "}
                                <i className="fa fa-envelope mx-4"></i>
                            </p>
                            <p>
                                Lorem Ipsum is simply{" "}
                                <i className="fa fa-paper-plane mx-4"></i>
                            </p>
                        </div>
                    </div>
                </div>
            )}
        </React.Fragment>
    );
}

export default About;
