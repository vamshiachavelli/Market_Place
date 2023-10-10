import React, { Component } from 'react'

export default class Contact extends Component {

    handleChange = e => {
        console.log(e.target.value);
    }

  render() {
    return (
        <section class="container" style={{background: '#fff', padding: '10px 0', display: 'flex', flexDirection: 'column', height: 'auto'}}>
        <div class="item" style={{marginBottom: '10px', display: 'flex', justifyContent: 'center'}}>
            <p style={{width: '20%', border: 'none'}}>Contact Us</p>
        </div>
                <div class="item" style={{marginBottom: '10px'}}>
                    <p style={{width: '20%', border: 'none'}}>Your Name</p>
                    <input type="text" name="" id="" style={{width: '80%', border: '1px solid black'}} />
                </div>
                <div class="item" style={{marginBottom: '10px'}}>
                    <p style={{width: '20%', border: 'none'}}>Your Email</p>
                    <input type="text" name="" id="" style={{width: '80%', border: '1px solid black'}} />
                </div>
                <div class="item" style={{marginBottom: '10px'}}>
                    <p style={{width: '20%', border: 'none'}}>Subject</p>
                    <input type="text" name="" id="" style={{width: '80%', border: '1px solid black'}} />
                </div>
                <div class="item" style={{marginBottom: '10px'}}>
                    <p style={{width: '20%', border: 'none'}}>Complain</p>
                    <input type="text" name="" id="" style={{width: '80%', border: '1px solid black'}} />
                </div>
                <div class="item" style={{marginBottom: '10px', display: 'flex', alignItems: 'center', justifyContent: 'center'}}>
                    <input type="submit" value="Send" style={{marginRight: '10px'}} />
                    <input type="reset" value="Cancel" />
                </div>
    </section>
    )
  }
}
