<?php get_header(); ?>

<style>
    .service-list {
        list-style-type: none;
        padding: 0;
        
        
    }

    .service-item {
        background-color: rgba(0, 0, 0, 0.7);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .service-item:hover{

        background-color: rgba(0, 0, 0, 1.0);
    }

    .service-item h3 {
        margin: 0;
        color:white;
    }

    .service-item p {
        margin: 0;
        color:white;
    }

    .service-price {
        font-size: 18px;
        font-weight: bold;
        color:white;
    }
</style>


<div class="container-fluid">
    <h1 style='color:white;background-color: rgba(0, 0, 0, 0.7);'>Our Services</h1>

    <ul class="service-list">
        <!-- Service 1 -->
        <li class="service-item">
            <div>
                <h3>Small Tattoos</h3>
                <p>Perfect for minimalistic designs, wrist tattoos, or other small-scale artwork.</p>
            </div>
            <span class="service-price">$50+</span>
        </li>

        <!-- Service 2 -->
        <li class="service-item">
            <div>
                <h3>Medium Tattoos</h3>
                <p>Great for more detailed pieces that are larger in size, such as forearm tattoos.</p>
            </div>
            <span class="service-price">$150+</span>
        </li>

        <!-- Service 3 -->
        <li class="service-item">
            <div>
                <h3>Large Tattoos</h3>
                <p>Full back pieces, sleeves, or other extensive designs that require more time and detail.</p>
            </div>
            <span class="service-price">$300+</span>
        </li>

        <!-- Service 4 -->
        <li class="service-item">
            <div>
                <h3>Custom Tattoo Designs</h3>
                <p>Work with our artists to create a one-of-a-kind design tailored to your vision.</p>
            </div>
            <span class="service-price">$100/hour</span>
        </li>

        <!-- Service 5 -->
        <li class="service-item">
            <div>
                <h3>Cover-Ups</h3>
                <p>Conceal old or unwanted tattoos with a fresh, new design.</p>
            </div>
            <span class="service-price">$200+</span>
        </li>

        <!-- Service 6 -->
        <li class="service-item">
            <div>
                <h3>Tattoo Touch-Ups</h3>
                <p>Bring your tattoo back to life by enhancing its colors and lines.</p>
            </div>
            <span class="service-price">$75+</span>
        </li>

        <!-- Service 7 -->
        <li class="service-item">
            <div>
                <h3>Piercings</h3>
                <p>We also offer a range of piercings, from ears to noses, with sterile equipment.</p>
            </div>
            <span class="service-price">$40+</span>
        </li>
    </ul>
</div>



<?php get_footer(); ?>