<?php

return [
    'permissions' => [
        'dashboard' => [
            'dashboard.view',
            'total_member.total_member_view',
            'total_student.total_student_view',
           
            'total_franchise.total_franchise_view',
            'active_franchise.active_franchise_view',
            'inactive_franchise.inactive_franchise_view',
            'approve_franchise.approve_franchise_view',
            'unapprove_franchise.unapprove_franchise_view',
            'total_leads.total_leads_view',
            'total_allocated_leads.total_allocated_leads_view',
            'total_non_allocated_leads.total_non_allocated_leads_view',
            'approve_counselor.approve_counselor_view',
            'total_agent.total_agent_view',
            'total_university.total_university_view',
            'total_program.total_program_view',
            'total_application.total_application_view',
            'total_unapprove_universties.total_unapprove_universties_view',
            'total_unapprove_program.total_unapprove_program_view',
            'total_unapprove_counceler.total_unapprove_counceler_view',
            'total_approve_counceler.total_approve_counceler_view',
            'total_assigned_leads.total_assigned_leads_view'
        ],
        'admin_user' => [
            'admin_user.create',
            'admin_user.view',
            'admin_user.update',
            'admin_user.delete',
        ],
        'role_permissions' => [
            'role_permissions.create',
            'role_permissions.view',
            'role_permissions.update',
            'role_permissions.delete',
        ],
        'profile' => [
            'profile.view',
            'profile.update',
        ],
        'leads_dashboard' => [
            'leads_dashboard.create',
            'leads_dashboard.view',
            'leads_dashboard.update',
            'leads_dashboard.delete',
        ],
        'add_leads' => [
            'add_leads.create',
            'add_leads.view',
            'add_leads.update',
            'add_leads.delete',
        ],
        'bulk_upload' => [
            'bulk_upload.create',
            'bulk_upload.view',
            'bulk_upload.update',
            'bulk_upload.delete',
        ],
        'pending_lead' => [
            'pending_lead.create',
            'pending_lead.view',
            'pending_lead.update',
            'pending_lead.delete',
        ],
        'assigned_lead' => [
            'assigned_lead.create',
            'assigned_lead.view',
            'assigned_lead.update',
            'assigned_lead.delete',
        ],
        'latest_updated_leads' => [
            'latest_updated_leads.create',
            'latest_updated_leads.view',
            'latest_updated_leads.update',
            'latest_updated_leads.delete',
        ],
        'oel_360' => [
            'oel_360.create',
            'oel_360.view',
            'oel_360.update',
            'oel_360.delete',
        ],
        'leads_list' => [
            'leads_lists.view',
        ],
        'universities' => [
            'universities.create',
            'universities.view',
            'universities.update',
            'universities.delete',
            'universities.show',
            "approve_university.approve_university_view",
            "manage_university.manage_university_view",
            "un_approve_university.un_approve_university_view",
            "updation_manage_university.updation_manage_university_view",
            "oel_review.oel_review_view",
            "oel_type.oel_type_view"
        ],
        'courses' => [
            'courses.create',
            'courses.view',
            'courses.update',
            'courses.delete',
            'courses.show',
        ],
        'application_status' => [
            'application_status.create',
            'application_status.view',
            'application_status.update',
            'application_status.delete',
            'application_status.show',
        ],
        'offer_details' => [
            'offer_details.create',
            'offer_details.view',
            'offer_details.update',
            'offer_details.delete',
            'offer_details.show',
        ],
        'visa_application' => [
            'visa_application.create',
            'visa_application.view',
            'visa_application.update',
            'visa_application.delete',
            'visa_application.show',
        ],
        'visa_status' => [
            'visa_status.create',
            'visa_status.view',
            'visa_status.update',
            'visa_status.delete',
            'visa_status.show',
        ],
        'fee_details' => [
            'fee_details.create',
            'fee_details.view',
            'fee_details.update',
            'fee_details.delete',
            'fee_details.show',
        ],
        'flight_details' => [
            'flight_details.create',
            'flight_details.view',
            'flight_details.update',
            'flight_details.delete',
            'flight_details.show',
        ],
        'take_off' => [
            'take_off.create',
            'take_off.view',
            'take_off.update',
            'take_off.delete',
            'take_off.show',
        ],
        'boarding' => [
            'boarding.create',
            'boarding.view',
            'boarding.update',
            'boarding.delete',
            'boarding.show',
        ],
        'done' => [
            'done.show',
            'done.view',
        ],
        'impersonate' => [
            'impersonate.view',
        ],
        'franchise' => [
            'franchise.create',
            'franchise.view',
            'franchise.update',
            'franchise.delete',
        ],
        'manage_oel_presentation' => [
            'manage_oel_presentation.create',
            'manage_oel_presentation.view',
            'manage_oel_presentation.update',
            'manage_oel_presentation.delete',
        ],
        'manage_oel_agreement_letter' => [
            'manage_oel_agreement_letter.create',
            'manage_oel_agreement_letter.view',
            'manage_oel_agreement_letter.update',
            'manage_oel_agreement_letter.delete',
        ],
        'manage_oel_pincode' => [
            'manage_oel_pincode.create',
            'manage_oel_pincode.view',
            'manage_oel_pincode.update',
            'manage_oel_pincode.delete',
        ],
        'admin' => [
            'admin.view',
        ],
        'programs' => [
            'programs.create',
            'programs.view',
            'programs.update',
            'programs.delete',
            'approve_program.approve_program_view',
            'manage_program.manage_program_view',
            'program_level_details.program_level_details_view',
            'education_level.education_level_view',
            'program_level.program_level_view',
            'grading_scheme.grading_scheme_view',
            'exams.exams_view',
            'field_of_study.field_of_study_view',
            'manage_recommended_programs.manage_recommended_programs_view'
        ],
        'program_level_details' => [
            'program_level_details.create',
            'program_level_details.view',
            'program_level_details.update',
            'program_level_details.delete',
        ],
        'exams' => [
            'exams.create',
            'exams.view',
            'exams.update',
            'exams.delete',
        ],
        'subject' => [
            'subject.create',
            'subject.view',
            'subject.update',
            'subject.delete',
        ],
        'program_level' => [
            'program_level.create',
            'program_level.view',
            'program_level.update',
            'program_level.delete',
        ],
        'my_profile' => [
            'my_profile.create',
            'my_profile.view',
            'my_profile.update',
            'my_profile.delete',
        ],
        'applied_program' => [
            'applied_program.create',
            'applied_program.view',
            'applied_program.update',
            'applied_program.delete',
        ],
        'student' => [
            'student.create',
            'student.view',
            'student.update',
            'student.delete',
        ],
        'specializations' => [
            'specializations.create',
            'specializations.view',
            'specializations.update',
            'specializations.delete',
        ],
        'source' => [
            'source.create',
            'source.view',
            'source.update',
            'source.delete',
        ],
        'interest' => [
            'interest.create',
            'interest.view',
            'interest.update',
            'interest.delete',
        ],
        'country' => [
            'country.create',
            'country.view',
            'country.update',
            'country.delete',
        ],
        'state' => [
            'state.create',
            'state.view',
            'state.update',
            'state.delete',
        ],
        'visa' => [
            'visa.create',
            'visa.view',
            'visa.update',
            'visa.delete',
        ],
        'faq' => [
            'faq.create',
            'faq.view',
            'faq.update',
            'faq.delete',
        ],
        'visa_service' => [
            'visa_service.create',
            'visa_service.view',
            'visa_service.update',
            'visa_service.delete',
        ],
        'testimonial' => [
            'testimonial.create',
            'testimonial.view',
            'testimonial.update',
            'testimonial.delete',
        ],
        'blogs' => [
            'blogs.create',
            'blogs.view',
            'blogs.update',
            'blogs.delete',
        ],
        'messages' => [
            'messages.create',
            'messages.view',
            'messages.update',
            'messages.delete',
        ],
        'oel_apply' => [
            'oel_apply.create',
            'oel_apply.view',
            'oel_apply.update',
            'oel_apply.delete',
        ],
        'scholorship' => [
            'scholorship.create',
            'scholorship.view',
            'scholorship.update',
            'scholorship.delete',
        ],
        'specializations' => [
            'specializations.create',
            'specializations.view',
            'specializations.update',
            'specializations.delete',
        ],
        'source' => [
            'source.create',
            'source.view',
            'source.update',
            'source.delete',
        ],
        'interested' => [
            'interested.create',
            'interested.view',
            'interested.update',
            'interested.delete',
        ],
        'country' => [
            'country.create',
            'country.view',
            'country.update',
            'country.delete',
        ],
        'country' => [
            'country.create',
            'country.view',
            'country.update',
            'country.delete',
        ],
        'province' => [
            'province.create',
            'province.view',
            'province.update',
            'province.delete',
        ],
        'visa_type' => [
            'visa_type.create',
            'visa_type.view',
            'visa_type.update',
            'visa_type.delete',
        ],
        'faq' => [
            'faq.create',
            'faq.view',
            'faq.update',
            'faq.delete',
        ],
        'education_lane' => [
            'education_lane.create',
            'education_lane.view',
            'education_lane.update',
            'education_lane.delete',
        ],
        'education_level' => [
            'education_level.create',
            'education_level.view',
            'education_level.update',
            'education_level.delete',
        ],
        'manage_blogs' => [
            'manage_blogs.create',
            'manage_blogs.view',
            'manage_blogs.update',
            'manage_blogs.delete',
        ],
        'vas_services' => [
            'vas_services.create',
            'vas_services.view',
            'vas_services.update',
            'vas_services.delete',
        ],
        'student_registration_fees' => [
            'student_registration_fees.create',
            'student_registration_fees.view',
            'student_registration_fees.update',
            'student_registration_fees.delete',
        ],
        'student_apply_question' => [
            'student_apply_question.create',
            'student_apply_question.view',
            'student_apply_question.update',
            'student_apply_question.delete',
        ],
        'student_assistance' => [
            'student_assistance.create',
            'student_assistance.view',
            'student_assistance.update',
            'student_assistance.delete',
        ],
        'student_enquiry_log' => [
            'student_enquiry_log.create',
            'student_enquiry_log.view',
            'student_enquiry_log.update',
            'student_enquiry_log.delete',
        ],
        'popular_student_guide' => [
            'popular_student_guide.create',
            'popular_student_guide.view',
            'popular_student_guide.update',
            'popular_student_guide.delete',
        ],
        'find_program_log' => [
            'find_program_log.create',
            'find_program_log.view',
            'find_program_log.update',
            'find_program_log.delete',
        ],
        'message_lead' => [
            'message_lead.create',
            'message_lead.view',
            'message_lead.update',
            'message_lead.delete',
        ],
        'message_franchise' => [
            'message_franchise.create',
            'message_franchise.view',
            'message_franchise.update',
            'message_franchise.delete',
        ],
        'message_student' => [
            'message_student.create',
            'message_student.view',
            'message_student.update',
            'message_student.delete',
        ],
        'outbox' => [
            'outbox.create',
            'outbox.view',
            'outbox.update',
            'outbox.delete',
        ],
        'trash' => [
            'trash.create',
            'trash.view',
            'trash.update',
            'trash.delete',
        ],
        'sms_template' => [
            'sms_template.create',
            'sms_template.view',
            'sms_template.update',
            'sms_template.delete',
        ],
        'proficiency_level' => [
            'proficiency_level.create',
            'proficiency_level.view',
            'proficiency_level.update',
            'proficiency_level.delete',
        ],
        'program_discipline' => [
            'program_discipline.create',
            'program_discipline.view',
            'program_discipline.update',
            'program_discipline.delete',
        ],
        'program_subdiscipline' => [
            'program_subdiscipline.create',
            'program_subdiscipline.view',
            'program_subdiscipline.update',
            'program_subdiscipline.delete',
        ],
        'program_sub_level' => [
            'program_sub_level.create',
            'program_sub_level.view',
            'program_sub_level.update',
            'program_sub_level.delete',
        ],
        'apply_program'=>[
            'apply_program.view'
        ],
        'ads' => [
            'ads.create',
            'ads.view',
            'ads.update',
            'ads.delete',
        ],
        'about_country' => [
            'about_country.create',
            'about_country.view',
            'about_country.update',
            'about_country.delete',
        ],
        'slider' => [
            'slider.create',
            'slider.view',
            'slider.update',
            'slider.delete',
        ],
        'grading_scheme' => [
            'grading_scheme.create',
            'grading_scheme.view',
            'grading_scheme.update',
            'grading_scheme.delete',
        ],
        'field_of_study' => [
            'field_of_study.create',
            'field_of_study.view',
            'field_of_study.update',
            'field_of_study.delete',
        ],
        'enquiry_email' => [
            'enquiry_email.view',
        ],
       'master_service'=> [
        'master_service.create',
        'master_service.view',
        'master_service.update',
        'master_service.delete',
       ],
       'documents'=> [
            'documents.create',
            'documents.view',
            'documents.update',
            'documents.delete',
       ],
       'visa_documents_type'=> [
            'visa_documents_type.create',
            'visa_documents_type.view',
            'visa_documents_type.update',
            'visa_documents_type.delete',
       ],
       'visa_sub_document_type'=> [
                'visa_sub_document_type.create',
                'visa_sub_document_type.view',
                'visa_sub_document_type.update',
                'visa_sub_document_type.delete',
        ],
        'learning_franchise'=> [
                'learning_franchise.create',
                'learning_franchise.view',
                'learning_franchise.update',
                'learning_franchise.delete',
        ],
       'learning_agents'=> [
                'learning_agents.create',
                'learning_agents.view',
                'learning_agents.update',
                'learning_agents.delete',
        ],
        'learning_student'=> [
                'learning_student.create',
                'learning_student.view',
                'learning_student.update',
                'learning_student.delete',
        ],
        'training_franchise'=> [
            'training_franchise.create',
            'training_franchise.view',
            'training_franchise.update',
            'training_franchise.delete',
       ],
       'training_agents'=> [
            'training_agents.create',
            'training_agents.view',
            'training_agents.update',
            'training_agents.delete',
       ],
       'training_student'=> [
            'training_student.create',
            'training_student.view',
            'training_student.update',
            'training_student.delete',
        ],
        'service_landing'=> [
            'service_landing.create',
            'service_landing.view',
            'service_landing.update',
            'service_landing.delete',
        ],
        'instagram'=> [
            'instagram.create',
            'instagram.view',
            'instagram.update',
            'instagram.delete',
        ],
        'account_dashboard'=> [
            'account_dashboard.create',
            'account_dashboard.view',
            'account_dashboard.update',
            'account_dashboard.delete',
        ],
        'check_eligibility'=> [
            'check_eligibility.view',
        ],
        'feedbackvideos'=> [
            'feedbackvideos.create',
            'feedbackvideos.view',
            'feedbackvideos.update',
            'feedbackvideos.delete',
        ],
        'student_amount'=> [
            'student_amount.create',
            'student_amount.view',
            'student_amount.update',
            'student_amount.delete',
        ],
        'sub_service'=> [
            'sub_service.create',
            'sub_service.view',
            'sub_service.update',
            'sub_service.delete',
        ],
        'lead_quality'=> [
            'lead_quality.create',
            'lead_quality.view',
            'lead_quality.update',
            'lead_quality.delete',
        ],
        'data_operator'=> [
            'data_operator.create',
            'data_operator.view',
            'data_operator.update',
            'data_operator.delete',
        ],
        'application'=> [
            'application.create',
            'application.view',
            'application.update',
            'application.delete',
        ],
      ],
];
