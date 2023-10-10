import React from 'react'

export default function Register() {
  return (
    <section class="container" style={{background: '#fff', padding: '10px 0', display: 'flex', flexDirection: 'column', height: 'auto'}}>
    <div class="item" style={{marginBottom: '10px', display: 'flex', justifyContent: 'center'}}>
        <p style={{border: 'none'}}>Business Owner Registration Page</p>
    </div>
    <form method="post">
            <div class="item" style={{marginBottom: '10px'}}>
                <p style={{width: '20%', border: 'none'}}>Your Name</p>
                <input type="text" name="" id="" style={{width: '80%', border: '1px solid black'}} />
            </div>
            <div class="item" style={{marginBottom: '10px'}}>
                <p style={{width: '20%', border: 'none'}}>Email</p>
                <input type="text" name="" id="" style={{width: '80%', border: '1px solid black'}} />
            </div>
            <div class="item" style={{marginBottom: '10px'}}>
                <p style={{width: '20%', border: 'none'}}>Address</p>
                <input type="text" name="" id="" style={{width: '80%', border: '1px solid black'}} />
            </div>
            <div class="item" style={{marginBottom: '10px'}}>
                <p style={{width: '20%', border: 'none'}}>Phone_No</p>
                <input type="text" name="" id="" style={{width: '80%', border: '1px solid black'}} />
            </div>
            <div class="item" style={{marginBottom: '10px', display: 'flex', alignItems: 'center', justifyContent: 'center'}}>
                <input type="submit" value="Send" style={{marginRight: '10px'}} />
                <input type="reset" value="Cancel" />
            </div>
    </form>
</section> 
    )
}
