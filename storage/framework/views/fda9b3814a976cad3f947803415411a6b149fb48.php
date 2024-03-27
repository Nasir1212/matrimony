<link href='https://fonts.googleapis.com/css?family=Hind Siliguri' rel='stylesheet'>

<style>
     .box {
            background-color: black;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
 
        p {
            font-size: 17px;
            align-items: center;
        }
 
        .box a {
            display: inline-block;
            background-color: #fff;
            padding: 15px;
            border-radius: 3px;
        }
 
        @keyframes scaleAnimation {
        0% {
        transform: scale(0);
        }
       
        100% {
        transform: scale(1);
        }
        }
        .modal-popup {
            align-items: center;
            display: flex;
            justify-content: center;
            position: fixed;
            width: 100%;
            height: 100%;
            /* background: #5d279725; */
            transition: all 0.4s;
          z-index: 1500;
    
        } 
        .content {
            position: fixed;
            bottom: 100;
            left: 0;
            right: 0;
            display: flex;
            background: white;
            max-width:400px ;
            width: 100%;
            height: 100%;
            max-height: 300px;
            padding: 2em 2em;
            border-radius: 4px;
            animation: scaleAnimation 1s;
            z-index: 20000;
            margin: 0 auto;
            text-align: justify;
            color: #5e2797;
            background-color: #FFF7FF;
            max-height: 23rem;
        }
 
        .box-close {
            position: absolute;
            top: -9px;
            right: 21px;
            color: #5e2797;
            text-decoration: none;
            font-size: 30px;
            cursor: pointer;
          
        }

        @media screen and (max-width: 425px) {
 
            .content {
                max-width:300px ;
            }
}
</style>
<?php

 $data_pop_up = App\Models\PopUpModel::first();
?>

<div class="content own_popup " id="popup_container">
    <div style="height: 16rem;padding: 1rem;background: white;width: 21rem;border-radius: 0.7rem;margin-top: 1rem;overflow:auto">
    <b><img style="width: 2rem;height: 2rem;margin-bottom: 1rem;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADaklEQVR4nO2a+2uOYRjHP9jGjJm1XxxCk+NCJEVSyj9Aw2bzkx8soyXllMRPKMnwE4U0yWHI+Uzvi5XktDGHpuQ0pNCwOWy667t6sufZ+77b+7zPvXo/9fyw57qf677u977v67ru6x4kSWI9g4G5wBagErgH1AEf9NTp3TG1yQcGYQnDgY3AI6DF4/mix0v+ANgA5AYxgOnAOeCvwyDza28HCoFJQJbLd1mSmTblwH3H90bXGWBqIgZgfrXTjs7NclkJDO2EzmHAauClQ+9JvY873YAy4Ls6eqr90D2OfRhdBcAz9dEAlMZRPxnAYSn/AawCUvCPVGAt8FN9HpINnaI/UOWYhbEkjnHAc/V9y2PPRUUf4K4UXQMySTz9gBuy4U5HZqaHPIhRcAHoRXCkA5dly6lY9+UafWjcY1+CJxN4KJuMl4yK8cAv4JsCni2MkCdrAvKi+eCSRl6CfSyVbecjNZyhhtXaJ7aRAjyWjSa78OSoGi2IoDDcTu7U2Sccoe9iR3zx3FBmb9QDaQEOJBSh757AR6BRIaIN+VK0B/vZK1vnuAm3STgP+ymQrVvdhK1BZxT2M0a2XnQT1kpokjbbSZOtT9yE7xRw/Nzc4Q7oDnvYZI4Ub90Eb5Sm+zmQUAd0h2IdSLU+DDJBjMvSat3sJqfp0pt9s4RF2E9he+53toS7sZ99stXY3IYMea3PAaco4ShSlE8607umKIaDUlZoca61UO2MrZ6Y4lmzCg02pvGpjsA9LVLjE2q4DPsok21no60mNijgjMQeRsumRrnfqCjVyKtVkgmaLKBGNq2ItUS631HTMiWZoOgtG1q07GMu0xoXfEUKbgLZBDMTIdlQpUF1iHRH9d0UlyeSOCYALxyxJTMeLm+XFDYloEyUCqzTpjZ9VnRmJtyYL8Um3fcDE7eKHLNgCoSL/ehooDq4HWe9ubpGeCX9zbqDHILPB/6dHvISFTAWAZOBHJdjc7ZkxdLjvHv8o5uqKfhMa3V+lkv1r7yd3MkEsa/tyM3d43q/rtr+ZwDwW9Pv9OMm8l+XQe9VSjLV8gPyNDU6jtbrvtHccRwBNikFN3oTyg4Zu0R/5+hQ06T3tUohrCZPBpslshw47nCNrem057nAJq66rOtmLamZdCEqgNf6D4VKzUpXqEYmSUIc+Af+05ebWLVawwAAAABJRU5ErkJggg=="></b>
 
    <p style="font-family: 'Hind Siliguri';"><?php echo e($data_pop_up->message); ?></p>
        <div class="d-flex justify-content-center">
            <button class="ok_btn" style="cursor: pointer;padding: 2px 2rem;text-align: center;color: white;background: linear-gradient(139deg, #8662FC, #60D5E8);border-radius: 1rem;margin: auto 0;font-size: 15px;font-weight: 500;border:none;">ok</button>
        </div>
  
   
    <a  class="box-close">×</a>
</div>

</div>
<div id="popup-box" class="modal-popup own_popup">

</div>
<script >

['box-close','ok_btn'].forEach(cls=>{
    document.querySelector(`.${cls}`).addEventListener('click', function () {
        document.querySelectorAll('.own_popup').forEach(btn =>{
            btn.remove()
        });        
  });
})
   window.onload = ()=>{
   
    setTimeout(() => {
        //popup_container.classList.add('d-none')
        // alert("Hello World")
        document.querySelectorAll('.own_popup').forEach(btn =>{
            btn.remove()
        });  
    }, 13000);
   }

</script><?php /**PATH C:\Nasir All Project\Nasir_Personal_Project\Ordangini\resources\views/component/popup.blade.php ENDPATH**/ ?>