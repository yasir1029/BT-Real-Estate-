<?php

$config = [

            'add_event_rules'      =>[
                                   
                                         [                                                           
                                                'field' =>'e_name',
                                                'label' =>'Event Name',
                                                'rules' =>'required'
                                        
                                         ]   


  
                                     ],
            'add_job_rules'      =>[
                                   
                                          [                                                           
                                                 'field' =>'j_name',
                                                 'label' =>'Job Title',
                                                 'rules' =>'required'
                                         
                                          ]   
 
 
   
                                      ],                         

            'admin_login_rules'     =>[
                                   
                                         [  
                                                'field' =>'username',
                                                'label' =>'User Name',
                                                'rules' =>'required|alpha|trim'
                                       
                                         ],   

                                         [  
                                               'field' =>'password',
                                               'label' =>'Password',
                                               'rules' =>'required'
                                        
                                         ]   


 
                                      ] ,
            
            
            'alumni_register_rules'     =>[
                                   
                                        [  
                                               'field' =>'a_email',
                                               'label' =>'Email',
                                               'rules' =>'required|valid_email'
                                      
                                        ],   

                                        [  
                                              'field' =>'a_password',
                                              'label' =>'Password',
                                              'rules' =>'required'
                                       
                                        ], 
                                        [  
                                            'field' =>'a_name',
                                            'label' =>'Name',
                                            'rules' =>'required'
                                   
                                        ]



                                ],         
              
       'alumni_login_rules'     =>[
                                   
                                        [  
                                               'field' =>'email',
                                               'label' =>'Email',
                                               'rules' =>'required|valid_email|trim'
                                      
                                        ],   

                                        [  
                                              'field' =>'password',
                                              'label' =>'Password',
                                              'rules' =>'required'
                                       
                                        ]   



                                     ] ,                                                




];
