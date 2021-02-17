<link href="/css/helpcenter.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>

<x-app-layout>

    <div class="wraper">
        <div style="padding:0px;">
            <img class="imgcont contaimg"
                src="/img/beach.jpg"
                alt="Snow" style="width:100%;">
            <h1
                style="position:absolute;top:24.5%;left:56%;transform: translate(-50%, -50%);color: black;font-size:30px">
                
                Hello there, How Can We Help?</h1>
        </div>
        <div class="wrap">
            
            {{-- <form action="{{ route('knowledge.search') }}" method="GET" style="margin: 20;">
                <div class="search">
                <input type="text" class="searchTerm" placeholder="Search...">
                <button type="submit" class="searchButton">
                    <i class="fas fa-search"></i>
                </button> 
                </div>
            </form> --}}
        </div>
    </div>


    <h4 class="title">Frequently Asked Question</h4>


    <div class="main-content">
        <div class="home_div row">
            <div class=" col s12 m10">
                <div class="row">
                    <ul class="col s12 m12 collapsible popout" data-collapsible="accordion" style="list-style: none">
                        @foreach ($hcenter as $hcqna)

                            <li>
                                <div class="collapsible-header">
                                    <i class="material-icons">picture_in_picture</i>{{$hcqna -> question}}
                                </div>
                                <div class="collapsible-body">
                                    <p>{{$hcqna ->answer}}</p>
                                </div>
                            </li>
                        @endforeach
   
                    </ul>
                </div>

            </div>

        </div>
    </div>

    <br/>
    <div class="row">
    
        <div class="col-6">
            <h4 class="title">Privacy Policy</h4>
             <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin: 0px 0px 50px 70px">
                Click to view Privacy Policy
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Privacy Policy</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <p>
                                This Service is made available for PETRONAS Dagangan Berhad (PDB). PDB takes its responsibilities under the Personal Data Protection Act 2010 and its regulations ("PDPA") seriously and is committed to respecting the privacy rights and concerns of all Users of our Aboutology's Solution, including our Aboutology web application and its related solutions, as defined in our Terms and Condition.
                                <br/><br/>
                                We recognize the importance of the personal data you have entrusted to us and believe that it is our responsibility to properly manage, protect and process your personal data. This Privacy Policy (“Privacy Policy” or “Policy”) is designed to assist you in understanding how we collect, use, disclose and/or process the personal data you have provided to us and/or we possess about you, whether now or in the future, as well as to assist you in making an informed decision before providing us with any of your personal data.
                                <br/><br/>
                                All definition in the TERMS OF USE shall be adopted unless the context otherwise required or specified.
                                <br/><br/>
                                PLEASE READ THIS PRIVACY POLICY CAREFULLY. BY ACCESSING THE APP, USING THE SERVICES AND/OR REGISTERING FOR AN ACCOUNT WITH US, YOU ACKNOWLEDGE THAT YOU HAVE BEEN NOTIFIED AND UNDERSTOOD THE TERMS OF THIS PRIVACY POLICY AND THAT YOU AGREE TO ACCEPT THE PRACTICES, REQUIREMENTS, AND/OR POLICIES OUTLINED IN THIS PRIVACY POLICY, AND HEREBY CONSENT TO US COLLECTING, USING, DISCLOSING AND/OR PROCESSING YOUR PERSONAL DATA AS DESCRIBED HEREIN. IF YOU DO NOT CONSENT TO THE PROCESSING OF YOUR PERSONAL DATA AS DESCRIBED IN THIS PRIVACY POLICY, PLEASE DO NOT USE OUR SERVICES OR ACCESS THE APP.
                                <br/><br/>
                                We may update this Privacy Policy from time to time. Any changes we make to this Privacy Policy in the future will be published and posted on the App and, where appropriate, notified to you by email, whereupon your continued access to the App and/or use of the Services shall constitute your acknowledgment and acceptance of the changes we make to this Privacy Policy. Please check back frequently to see any updates or changes to this Privacy Policy.
                                <br/><br/>            
                                If you have any queries, comments, suggestions or complaints regarding this Privacy Policy or our privacy practices, please contact us through email to hello@Aboutology.my .
                                <br/><br/>
                            </p>
                            <p>

                                    <strong>THE PERSONAL DATA WE COLLECT FROM YOU</strong>
                                    <br/>
                                    Personal data means any information, whether recorded in a material form or not, from which the identity of an individual is apparent or can be reasonably and directly ascertained by the entity holding the information, or when put together with other information would directly and certainly identify an individual.


                                <ul>
                                    <li>
                                    <strong>We may collect the following personal data from you:</strong>
                                    <ul>
                                        <li>
                                        Identity data, such as your username, password, and date of birth;
                                        </li>
                                        <li>
                                        Contact data, such as email, and phone numbers;
                                        </li>
                                    </ul>
                                    </li>
                                    <li>
                                    During the course of your use of the App and/or the Services, we may receive personal data from you in the following situations:
                                    <ul>
                                        <li>
                                        When you register an Account with Aboutology;
                                        </li>
                                        <li>
                                        When you submit any forms to us, including (but not limited to) application or registration form, whether online or by way of a physical form;
                                        </li>
                                        <li>
                                        When you enter into any agreement or provide other documentation or information in respect of your arrangement with us;
                                        </li>
                                        <li>
                                        When you use any of the features or functions available on the App and/or Services;
                                        </li>
                                        <li>
                                        When you log in to your Account on our App or otherwise interact with us via an external service or application, such as Email or Chatbot.
                                        </li>
                                    </ul>
                                    </li>
                                    <li>
                                    You must only submit personal data which is accurate and not misleading and you must keep it up to date and inform us of changes. We shall have the right to request for documentation to verify the personal data provided by you as part of our verification processes.
                                    </li>
                                    ​
                                    <li>
                                    We will only be able to collect your personal data if you voluntarily submit the personal data to us. Unfortunately, if you choose not to submit your personal data to us or subsequently withdraw your consent to our use of your personal data, we may not be able to provide you with our Services or access to the App.
                                    </li>
                                    ​
                                    <li>
                                    If you provide personal data of any third party to us, you represent and warrant that you have obtained the necessary consent from that third party to share and transfer his/her personal data to us, and for us to collect, use and disclose that data in accordance with this Privacy Policy.
                                    </li>
                                </ul>   

                                <strong>USE AND DISCLOSURE OF PERSONAL DATA</strong>
                                <ul>
                                    <li>
                                    We may collect, use, disclose and/or process your personal data for one or more of the following purposes (“Purposes”):
                                    <ul>
                                        <li>
                                        To consider and/or process your application and/or transaction with us;
                                        </li><li>
                                        To respond to, process, deal with or complete a transaction and/or to fulfill your order tickets, booking or requests and notify you of any service issues and unusual account actions;
                                        </li><li>
                                        To deal with or facilitate customer service, carry out your instructions, deal with or respond to any enquiries given by (or purported to be given by) you or on your behalf;
                                        </li><li>
                                        To contact you or communicate with you via voice call, text message, Whatsapp, Chatbot and/or fax message, email and/or postal mail or otherwise for the purposes of administering and/or managing your relationship with us or your use of our Services, such as but not limited to communicating administrative information to you relating to our Services. You acknowledge and agree that such communication by us could be by way of the mailing of correspondence, documents or notices to you, which could involve disclosure of certain personal data about you to bring about delivery of the same as well as on the external cover of envelopes/mail packages;
                                        </li><li>
                                        To administer your Account (if any) with us;
                                        </li><li>
                                        To verify and carry out financial transactions in relation to payments (if any);
                                        </li><li>
                                        To carry out due diligence or other screening activities (including, without limitation, background checks) in accordance with legal or regulatory obligations or our risk management procedures that may be required by law or that may have been put in place by us;
                                        </li><li>
                                        To identify and verify visitors on the App;
                                        </li><li>
                                        To audit our businesses;
                                        </li><li>
                                        To prevent or investigate any fraud, unlawful activity, omission or misconduct, whether relating to your use of our Services or any other matter arising from your relationship with us, and whether or not there is any suspicion of the aforementioned;
                                        </li><li>
                                        To carry out research on our users’ demographics and behavior;
                                        </li><li>
                                        Subject to having obtained your consent, to send you marketing or promotional materials of our services from time to time;
                                        </li><li>
                                        To conduct automated-decision making processes in accordance with any of these purposes; and/or
                                        </li><li>
                                        Any other purposes which we notify you of at the time of obtaining your consent.
                                        </li>
                                    </ul>
                                    </li>
                                    <li>
                                    The personal data we collect from you for the Purposes may be shared with or transferred to the following third parties:
                                    <ul><li>
                                        Our parent, associated, subsidiary and/or related companies;
                                        </li><li>
                                        Our business partners including the Partnered Service Providers, business affiliates, agents and vendors that we have entered into agreements with;
                                        </li>
                                        <li>
                                        Our auditors, business consultants, accountants, lawyers or other professional advisers and/or consultants as we deem necessary and appropriate;
                                        </li><li>
                                        Our sub-contractors or appointed third party service providers as we deem necessary or appropriate, including but not limited to the website/system/portal developer/administrator and marketing companies or entities.
                                        </li>
                                    </ul>
                                    </li>​
                                    <li>
                                    In sharing and/or transferring your personal data to the third parties, we endeavor to ensure that such third parties will keep your personal data secured from unauthorized access, collection, use, disclosure, or similar risks and retain your personal data only for as long as they need your personal data to achieve the Purposes.
                                    </li>
                                    ​
                                    <li>
                                    YOU IRREVOCABLY ACKNOWLEDGE AND AGREE THAT ABOUTOLOGY HAS THE RIGHT TO DISCLOSE YOUR PERSONAL DATA TO ANY LEGAL, REGULATORY, GOVERNMENTAL, TAX, LAW ENFORCEMENT OR OTHER AUTHORITIES OF ANY RELEVANT JURISDICTION IF Aboutology HAS REASONABLE GROUNDS TO BELIEVE THAT DISCLOSURE OF YOUR PERSONAL DATA IS NECESSARY FOR THE PURPOSE OF MEETING ANY OBLIGATIONS, REQUIREMENTS OR ARRANGEMENTS, WHETHER VOLUNTARY OR MANDATORY, AS A RESULT OF COOPERATING WITH AN ORDER, AN INVESTIGATION AND/OR A REQUEST OF ANY NATURE BY SUCH PARTIES. TO THE EXTENT PERMISSIBLE BY APPLICABLE LAW, YOU AGREE NOT TO TAKE ANY ACTION AND/OR WAIVE YOUR RIGHTS TO TAKE ANY ACTION AGAINST Aboutology FOR THE DISCLOSURE OF YOUR PERSONAL DATA IN THESE CIRCUMSTANCES.
                                    </li>
                                    ​</ul>

                                <strong>UPDATING OR CORRECTING YOUR PERSONAL DATA</strong>
                                <ul>
                                    <li>
                                    It is important that the personal data you provide to us is accurate. You are responsible for informing us of changes to your personal data, or in the event you believe that the personal data we have about you is inaccurate, incomplete, misleading or out of date. You can correct or update your personal data anytime by contacting us through our ‘Contact Us’ page or email Hello@Aboutology.my.
                                    </li>
                                </ul>
                                ​

                                <strong>ACCESSING YOUR PERSONAL DATA</strong>
                                <ul>
                                    <li>If you would like request information about your personal data which we have collected, or inquire about the ways in which your personal data may have been used or disclosed by us, please contact us via email.
                                    </li>
                                    ​

                                    <li>We may be charging you a reasonable administrative fee for the handling and processing of your requests to access your personal data. If we opt to charge, we will provide you with a written estimate of the administrative fee we will be charging. Please note that we are not required to respond to or deal with your access request unless you have agreed to pay the fee.
                                    </li>
                                    ​

                                    <li>We will respond to your request as soon as reasonably possible. Should we not be able to respond to your request within fifteen (15) business days from the date of your request, we will inform you in writing. If we are unable to provide you with any personal data or to make a correction requested by you, we shall generally inform you of the reasons why we are unable to do so (except where we are not required to do so under the applicable data protection laws).
                                    </li>
                                    ​</ul>

                                <strong>RETENTION OF PERSONAL DATA</strong>
                                <ul>
                                    <li>We will only retain your personal data for as long as we are either required to by law or as is relevant for the Purposes for which it was collected.
                                    </li>
                                    <br/>
                                    ​
                                    <li>
                                    We will cease to retain your personal data, or remove the means by which the data can be associated with you, as soon as it is reasonable to assume that such retention no longer serves the purposes for which the personal data was collected, and is no longer necessary for any legal or business purpose.
                                    </li>
                                    <br/>
                                    ​
                                    <li><strong>Collection of Computer and/or App Data​</strong>
                                    <ul>
                                        <li>Aboutology or our authorised service providers may from time to time implement "cookies" or other features to allow us or third parties to collect or share information that will help us improve our App and/or the Services we offer, or help us offer new services and features.
                                        </li>

                                        <li>“Cookies” are identifiers we transfer to your computer or mobile device that allow us to recognize your computer or device and tell us how and when the App or Services are accessed or used, by how many people and to track movements within our App. We may link cookie information to personal data. Cookies are also used to deliver content specific to your interest and to monitor App’s usage.
                                        </li>

                                        <li>You may be able to manage and delete cookies through your browser or device settings. However, please note that if you do this you may not be able to use the full functionality of our App or Services.
                                        </li>
                                    </ul>
                                    ​</li>

                                </ul>
                                    
                            </p>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <h4 class="title">Term of Service</h4>
                        
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" style="margin: 0px 0px 50px 70px" data-toggle="modal" data-target="#exampleModalOut">
                Click to view Term of Service
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModalOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                   {{--  <div class="modal-header">
                        <h5 class="modal-title" >Term of Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}
                    <div class="modal-header">
                        <h4 class="modal-title">Term of Services</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" >
                        This Service (as hereinafter defined) is made available for Petronas Dagangan Berhad (PDB) subject to the Terms and Conditions herein. 
                        You acknowledge that you have read and fully understood these Terms and Conditions. 
                        Your use of the Service, upon Activation, constitutes unconditional acceptance to be bound by these Terms and Conditions as may be amended from time to time. 
                        You must ensure that any person you all allow to use the Service complies with these Terms and Conditions.
                        ​
                        <br/><br/>
                        <strong>General Terms and Conditions</strong><br/>
                        <strong>Definitions</strong><br/>
                        For the purpose of these Terms and Conditions, the following terms shall, 
                        unless the context otherwise requires, have the meanings as defined below. 
                        All other terms not defined herein shall have the have the meaning as may generally be accepted within the industry based on the context used herein:
                        
                        <ul>
                            <li> <strong>“Account”</strong> means an account opened for you in Aboutology for subscribing to the Service as provided at the Web App.</li>
                            <li> <strong>“Activation” or “Activated” </strong> means the point in time when the Service is activated in Aboutology’s System.</li>
                            <li> <strong>“Agreement”</strong> means this Terms and Conditions including any Addendum and all subsequent amendments and variations to the Terms and Conditions.</li>
                            <li> <strong>“Personal Information”</strong> means the information collected by Aboutology from you for the purpose of the registration for the Service as prescribed under Clause 3.1 below;</li>
                            <li> <strong>"Service(s)"</strong>means the App/ Web Portal, the contents of the Web Portal which enables you to conduct related maintenance service as may be notified by Aboutology to you from time to time;</li>
                            <li> <strong>“You” or “Your”</strong> Refers to the person authorised to use the Service subject to this Terms and Conditions herein and/or 
                            an entity of whatsoever description including but not limited to a sole proprietorship, a partnership, 
                            a body corporate or otherwise governmental bodies and agencies of any kind established under the laws, 
                            rules and/or regulations for the time being in force and which may come into force.</li>
                        </ul><br/>
                        <strong>Period of Agreement</strong>
                        <br/>
                        This Agreement shall take effect from the Activation date of your Account or from the date of registration for Aboutology's Solution, as the case may be and shall continue to be in force until terminated in accordance with these Terms and Conditions.
                        <br/><br/>
                        <strong>Service</strong>
                                <ul>
                                    <li>
                                    You may register to use the Service by (“Registration”):
                                        <ul>
                                            <li>Registered by Aboutology’s personnel;
                                            </li>
                                            <li>providing the following details on the App:
                                                <ul>
                                                    <li>username;</li>
                                                    <li>password; and</li>
                                                    <li>email address</li>
                                                    <li>mobile number</li>
                                                    <li>date of birth</li>
                                                    
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                    Upon successful Registration, you shall receive a confirmation email from Aboutology which shall be sent to your email address.
                                    </li>
                                </ul>
                                <strong>Your Responsibility</strong>
                                    <ul>
                                        <li>
                                            You shall:
                                            <ul>
                                                <li>provide accurate and complete information to Aboutology and inform Aboutology immediately of any changes in any particulars of your Personal Information;</li>
                                                <li>
                                                    only use the Service for the purpose for which it is subscribed;</li>
                                                <li>
                                                    comply with all notice or instruction given by Aboutology from time to time in relation to the use of the Service;</li>
                                                <li>
                                                    be responsible for all equipment and software necessary to use the Service and also for the security and integrity of all information and data transmitted, disclosed and/or obtained through the use of the Service;</li>
                                                <li>
                                                    acknowledge that Aboutology is not liable for any loss or damages suffered by you or any other person as a result of using information obtained using from the Service, including but not limited to, any damage to or loss of data caused by a virus or similar
                                                    program;</li>
                                                <li>
                                                    agrees, consents, allows and has no objection to Aboutology extracting Personal Information or any other data required to be used as evidence in court and/or when necessary in the event of a suspected and or proven misuse of the Service for you commercial
                                                    gain purposes;</li>

                                                <li>
                                                    be responsible for all usage of and charges for the Service including but not limited to payment of all the Service charges and any other related charges due to Aboutology pursuant to these Terms and Conditions in a timely manner;</li>
                                                <li>
                                                    keep your User ID and password confidential at all times and not release the same to any person;

                                                </li>
                                                <li>
                                                    be solely responsible and liable for any use and misuse of your User ID you’re your password and for all activities that occur under your User ID;

                                                </li>
                                                <li>
                                                    immediately notify Aboutology of any unauthorised usage of the User ID or password, or if you know or suspect that the User ID or password has been lost or stolen, has become known to any other person, or has been otherwise compromised;

                                                </li>
                                                <li>
                                                    comply with the provisions of these Terms and Conditions;

                                                </li>
                                                <li>
                                                    comply with all applicable laws of Malaysia relating to the Service, including without limitation to the Communication and Multimedia Act 1998 and its subsidiary legislation, other acts, statutes, by-laws, rules and regulations issued by relevant government
                                                    and regulatory agencies which may be amended from time to time; and

                                                </li>
                                                <li>
                                                    take all reasonable steps to prevent fraudulent, improper or illegal use of the Service;

                                                </li>
                                                <li>
                                                    cease to utilise the Service or any part thereof for such period as may be required by Aboutology; and

                                                </li>
                                                <li>
                                                    indemnify and shall keep indemnified Aboutology from any loss, damage, liability or expense, arising from any claims for libel, invasion of privacy, infringement of copyright, patent, breach of confidence or privilege or breach of any law or regulation whatsoever
                                                    arising from the content transmitted, received or stored via the Service or part thereof and for all other claims arising out of any act or omission of your or any unauthorised use or exploitation of the Services or part thereof.

                                                </li>

                                            </ul>
                                        </li>
                                        <li>You shall not:
                                            <ul>
                                                <li>
                                                    use, display, mirror or frame the App, or any individual element within the App, Aboutology’s name, any Aboutology trademark, logo or other proprietary information, or the layout and design of any page or form contained on a page, without Aboutology’s express written
                                                    consent;
                                                </li>
                                                <li>
                                                    access, tamper with, or use non-public areas of the App, Aboutology’s computer systems, or the technical delivery systems of Aboutology’s providers;
                                                </li>
                                                <li>
                                                    attempt to probe, scan, or test the vulnerability of any Aboutology’s System or network or breach any security or authentication measures;
                                                </li>
                                                <li>
                                                    avoid, bypass, remove, deactivate, impair, descramble or otherwise circumvent any technological measure implemented by Aboutology or any of Aboutology’s providers or any other third party (including another user) to protect the App, Services or the Products;
                                                </li>
                                                <li>
                                                    attempt to download information from the App or Services through the use of any engine, software, tool, agent, device or mechanism (including spiders, robots, crawlers, data mining tools or the like) other than the software and/or search agents provided
                                                    by Aboutology or other generally available third party web browsers;
                                                </li>
                                                <li>
                                                    send any unsolicited or unauthorised advertising, promotional materials, email, junk mail, spam, chain letters or other form of solicitation;
                                                </li>
                                                <li>
                                                    use any meta tags or other hidden text or metadata utilising a Aboutology trademark, logo URL or product name without Aboutology’s express written consent;
                                                </li>
                                                <li>
                                                    use the App, Services or the Products for any commercial purpose or the benefit of any third party or in any manner not permitted by these terms of use, unless expressly permitted;
                                                </li>
                                                <li>
                                                    forge any TCP/IP packet header or any part of the header information in any email or newsgroup posting, or in any way use the App, Services or the Products to send altered, deceptive or false source-identifying information;
                                                </li>
                                                <li>
                                                    attempt to decipher, decompile, disassemble or reverse engineer any of the software used to provide the App, Services or the Products;
                                                </li>
                                                <li>
                                                    interfere with, or attempt to interfere with, the access of any user, host or network, including, without limitation, sending a virus, overloading, flooding, spamming, or mail-bombing the App;
                                                </li>
                                                <li>
                                                    collect or store any personally identifiable information from the App or Services from other users of the App or Services without their express permission;
                                                </li>
                                                <li>
                                                    impersonate or misrepresent your affiliation with any person or entity;
                                                </li>
                                                <li>
                                                    violate any applicable law or regulation;
                                                </li>
                                                <li>
                                                    encourage or enable any other individual to do any of the foregoing; or
                                                </li>
                                                <li>
                                                    directly or through the use of any device, software, internet site, web or app-based service, or other means remove, alter, bypass, avoid, interfere with, or circumvent any copyright, trademark or other proprietary notices marked on the Products or any
                                                    digital rights management mechanism, device, or other content protection or access control measure associated with the Products including geo-filtering mechanisms;
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <br/>
                                    <strong>Aboutology’s Rights</strong>
                                    <ul>
                                        <li>
                                            Aboutology reserves the right to make any alteration or changes to the Service, or any part thereof, or suspend the Service or any part thereof without prior notice and Aboutology shall not be liable for any loss or inconvenience to you resulting therefrom.
                                        </li>
                                        <li>
                                            Aboutology reserves the right at its absolute discretion, from time to time, to vary, add to or otherwise amend the terms and conditions of the Agreement or any part thereof. Your continued use of the Service after the effective date of any variation, addition or amendments to the terms and conditions of the Agreement shall constitute your unconditional acceptance of such variations, additions or amendment
                                        </li>
                                    </ul>

                                    <br/>
                                    <strong>Privacy and Personal Information</strong>
                                    <ul>
                                        <li>
                                            You acknowledge that you are aware and give your consent to Aboutology that your Personal Information will be used and/or disclosed in accordance to the Personal Data Protection Act 2010.
                                        </li>
                                    </ul>
                                    <br/>
                                    <strong>Disclaimer</strong>
                                    <ul>
                                        <li>
                                            The content, Products and Services offered on or listed through the App are provided on an “As Is” and “As Available” basis and all warranties, express or implied are disclaimed, including but not limited to the disclaimer of any implied warranties of title, non-infringement, merchantability, quality and fitness for a particular purpose. The information and Services may contain bugs, errors, problems or other limitations. Aboutology shall not be liable for your use of any information or service.
                                        </li>
                                    </ul>
                                    <br/>
                                    <strong>Aboutology's Liability</strong>
                                    <ul>
                                        <li>
                                            Aboutology shall not be liable to you or anyone else for any loss or injury or any direct, indirect, special, exemplary, consequential damages, or any damages whatsoever including but not limited to loss of use, data, revenue or profits, whether in action of contract, negligence or other tortuous actions, arising out or in connection with your use of the Service.
                                        </li>
                                        <li>
                                            The App may contain links to other websites, which are not operated by Aboutology. When the you activate such links, you will leave the App and Aboutology has no control over, and will accept no responsibility or liability in respect of, the material on any website or app which is not under Aboutology’s control.
                                        </li>
                                        <li>
                                            Aboutology shall not be liable for, and you agree to indemnify Aboutology against all claims, losses, liabilities, proceedings, demands, costs and expenses (including legal fees) which may result or which Aboutology may sustain in connection with or arising from the provision of the Service to you.    </li>
                                        <li>
                                            Without prejudice to the foregoing, in the event of a court or tribunal holds or finds Aboutology liable to you for any breach or default of Aboutology, you agree that the amount of damages payable by Aboutology to you shall not at any time exceed the sum of RM100.00 notwithstanding any order, decree or judgment to the contrary.
                                        </li>
                                    </ul>
                                    <br/>
                                    <strong>Matters Beyond Aboutology’s Control</strong>
                                    <ul>
                                        <li>
                                            Without limiting the generality of any provision in the Agreement, Aboutology shall not be liable for any failure to perform its obligations herein caused by an act of God, insurrection or civil disorder, military operations or act of terrorism, all emergency, acts or omission of Government, or any competent authority, labour trouble or industrial disputes of any kind, fire, lightning, subsidence, explosion, floods, acts or omission of persons or bodies for whom Aboutology has no control over or any cause outside Aboutology’s reasonable control.

                                        </li>
                                        <li>
                                            Notwithstanding the event prescribed in Clause 9.1 above, you shall remain obliged to pay all fees and charges if any which are outstanding and/or due and payable to Aboutology in accordance with the Agreement.

                                        </li>
                                        <li>
                                            The Service may occasionally be affected by network or data interference caused by telecommunication service providers beyond Aboutology’s control. In the event of such interference, Aboutology shall not be responsible for any inability to use or access the Service, interruption or disruption of the Service.

                                        </li>
                                        
                                    </ul>

                                    <br/>
                                    <strong>Proprietary Rights and Conditions</strong>
                                    <ul>
                                        <li>
                                            All right, title and interest including, but not limited to, copyright and other intellectual property rights in and to the Service (including but not limited to all graphic/image and text files on the App) are owned by Aboutology. Such rights are protected by Malaysian copyright laws, other applicable copyright laws, and international treaty provisions. Aboutology retains all rights not expressly granted herein.
                                        </li>
                                        <li>
                                            Except where expressly stated to the contrary all persons (including their names and images), third party trademarks and images of third party products, services and/or locations featured on this App are in no way associated, linked or affiliated with Aboutology and you should not rely on the existence of such a connection or affiliation. Any trademarks/names featured on this App are owned by the respective trade mark owners. Where a trade mark or brand name is referred to it is used solely to describe or identify the Products and services and is in no way an assertion that such Products or services are endorsed by or connected to Aboutology.
                                        </li>

                                    </ul>

                                    <br/>
                                    <strong>Restrictions</strong>
                                    <ul>
                                        <li>
                                            Aboutology reserves the right to refuse permission to use this Service to any individual or company for any reason, and may do so without notice. 
                                        </li>

                                    </ul>
                                    <br/>
                                    <strong>Severability and Effect of these Terms and Conditions</strong>
                                    <ul>
                                        <li>
                                            If any of the provision of these Terms and Conditions should be invalid, illegal or unenforceable under any applicable law, the legality and enforceability of the remaining provisions shall not be affected or impaired in any way and such invalid, illegal or unenforceable provision shall be deemed deleted.
                                        </li>
                                        <li>
                                            The terms and conditions contained in the Agreement shall have effect only to the extent not forbidden by law. For the avoidance of doubt, it is hereby agreed and declared in particular, but without limitation, that nothing herein shall be construed as an attempt to contract out of any provisions of the Consumer Protection Act 1999, if and where the said Act is applicable.
                                        </li>

                                    </ul>
                                    <br/>
                                    <strong>Governing Law</strong>
                                    <ul>
                                        <li>
                                            The Agreement shall be governed and construed in accordance with the laws of Malaysia, excluding conflict of law rules. Parties agree to submit to the exclusive jurisdiction of Malaysian courts.
                                        </li>
                                        <li>
                                            Subject to Clause 14.1 above, this Agreement is subject to the Communications and Multimedia Act 1998 (“Act”) and any applicable subsidiary legislation, rules and regulations. This Agreement shall also be subject to the directives and orders of the relevant regulatory authority and to the terms and conditions of the license(s) granted to Aboutology under the Act.
                                        </li>

                                    </ul>

                                    <br/>
                                    <strong>Notices</strong>
                                    <ul>
                                        <li>
                                            All official bill statements, notices, requests, notice of demands, writ of summons, all other legal process and/or other communications/documents to be given by Aboutology to you under the Agreement will be in writing and sent to your last known address and/or published in national newspapers in the main languages, published daily and circulating generally throughout Malaysia, as the case maybe.
                                        </li>
                                        <li>
                                            All notices, requests, notice of demands, writ of summons, all other legal process and/or other communications/documents to be given by you to Aboutology under the Agreement must be in writing and sent to the following address: Project Aboutology (PETRONAS Dagangan Berhad), 1st Floor, Common Ground Ampang, Jalan Kolam Air Lama, 68000 Ampang Jaya, Selangor, Malaysia or hello@repairwhiz.my or such address as notified in writing by Aboutology to you.

                                        </li>
                                        <li>All official statements, notices, requests, notice of demands, writ of summons, all other legal process and/or other communications/documents given by Aboutology to you pursuant to this clause shall be deemed to have been served if:-

                                            <ul>
                                                <li>
                                                    sent by registered post, on the second Working Day after the date of posting irrespective of whether it is returned undelivered;
                                                </li>
                                                <li>
                                                    sent by ordinary post, on the fifth Working Day after the date of posting irrespective of whether it is returned undelivered;
                                                </li>
                                                <li>
                                                    hand delivered, upon delivery;
                                                </li>
                                                <li>
                                                    sent by facsimile, upon successful completion of transmission as evidence by a transmission report and provided that notice shall in addition thereon be sent by post to the other party; or
                                                </li>
                                                <li>
                                                    published in national newspapers in the main languages, published daily and circulating generally throughout Malaysia in respect of any change in the Services, terms of the Agreement or charges.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                    <br/>
                                    <strong>Assignment</strong>
                                    <ul>
                                        <li>
                                            You are not permitted to assign or novate any or part of their rights or obligations under the Agreement to any party, without the prior Aboutology’s prior written consent.
                                        </li>
                                        <li>
                                            15.2 Aboutology may assign or novate all or part of the Agreement to a new Aboutology business entity, or another subsidiary within PETRONAS Dagangan Berhad or to any related third party without your prior consent and that you agree that personal data collected by Aboutology and data derived from Aboutology’s Solution can be used subjected to adherence of Clause 6 above and to make all subsequent payments (if applicable) as instructed in such or further notice.

                                        </li>

                                    </ul>
                                    <br/>
                                    <strong>Indulgence and Waiver</strong>
                                    <ul>
                                        <li>
                                            No delay or indulgence by Aboutology in enforcing any provision of the Agreement nor the granting of time by Aboutology to you shall prejudice the rights or powers of Aboutology nor shall any waiver by Aboutology of any breach constitute a continuing waiver in respect of any subsequent or continuing breach.
                                        </li>
                                    </ul>

                                    <br/>

                                    <strong>Suspension and Termination</strong>
                                    <ul>
                                        <li>
                                            You may at any time terminate the Agreement by giving Aboutology prior written notice. The Service shall be deemed terminated within ten (10) Working Days from receipt of the termination notice by Aboutology.
                                        </li>
                                        <li>
                                            Aboutology reserves the right to cancel, withdraw, terminate or suspend the Service for any reason whatsoever at its sole discretion by way of a notice to you. You agree that Aboutology shall not be liable to you or to any other party for such cancellation, withdrawal, termination or suspension.
                                        </li>

                                    </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    
    </div>
</x-app-layout>
