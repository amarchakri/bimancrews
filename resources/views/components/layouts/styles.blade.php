
<style>
            /*
                Auther: Abdelrhman Said
            */

            @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

            /* * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            } */

            *:focus,
            *:active {
                outline: none !important;
                -webkit-tap-highlight-color: transparent;
            }

            /* html,
            body {
                display: grid;
                height: 100%;
                width: 100%;
                font-family: "Poppins", sans-serif;
                place-items: center;
                background: linear-gradient(315deg, #ffffff, #d7e1ec);
            } */

            .toottipwrapper {
                display: inline-flex;
                list-style: none;
            }

            .toottipwrapper .icon {
                position: relative;
                background: #ffffff;
                border-radius: 50%;
                /* padding: 15px; */
                margin: 1px;
                width: 50px;
                height: 50px;
                font-size: 18px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                /* box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); */
                cursor: pointer;
                transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            }

            .toottipwrapper .tooltip {
                position: absolute;
                top: 0;
                font-size: 14px;
                background: #ffffff;
                color: #ffffff;
                padding: 5px 8px;
                border-radius: 5px;
                box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
                opacity: 0;
                pointer-events: none;
                transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            }

            .toottipwrapper .tooltip::before {
                position: absolute;
                content: "";
                height: 8px;
                width: 8px;
                background: #ffffff;
                bottom: -3px;
                left: 50%;
                transform: translate(-50%) rotate(45deg);
                transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            }

            .toottipwrapper .icon:hover .tooltip {
                top: -45px;
                opacity: 1;
                visibility: visible;
                pointer-events: auto;
            }

            /* .wrapper .icon:hover span,
            .wrapper .icon:hover .tooltip {
                text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
            } */

            /* Edit */
            .toottipwrapper .edit:hover .tooltip,
            .toottipwrapper .edit:hover .tooltip::before {
                background: #A112EE;
                color: #ffffff;
            }
            /* Delete */
            .toottipwrapper .delete:hover .tooltip,
            .toottipwrapper .delete:hover .tooltip::before {
                background: #F60614;
                color: #ffffff;
            }
            /* Update */
            .toottipwrapper .update:hover .tooltip,
            .wrapper .update:hover .tooltip::before {
                background: #F31CF3;
                color: #ffffff;
            }
            /* Cancel */
            .toottipwrapper .cancel:hover .tooltip,
            .toottipwrapper .cancel:hover .tooltip::before {
                background: #BB0D79;
                color: #ffffff;
            }
            .wrapper .facebook:hover,
            .wrapper .facebook:hover .tooltip,
            .wrapper .facebook:hover .tooltip::before {
                background: #1877F2;
                color: #ffffff;
            }

            .wrapper .twitter:hover,
            .wrapper .twitter:hover .tooltip,
            .wrapper .twitter:hover .tooltip::before {
                background: #1DA1F2;
                color: #ffffff;
            }

            .wrapper .instagram:hover,
            .wrapper .instagram:hover .tooltip,
            .wrapper .instagram:hover .tooltip::before {
                background: #E4405F;
                color: #ffffff;
            }

            .wrapper .github:hover,
            .wrapper .github:hover .tooltip,
            .wrapper .github:hover .tooltip::before {
                background: #333333;
                color: #ffffff;
            }

            .wrapper .youtube:hover,
            .wrapper .youtube:hover .tooltip,
            .wrapper .youtube:hover .tooltip::before {
                background: #CD201F;
                color: #ffffff;
            }

</style> 