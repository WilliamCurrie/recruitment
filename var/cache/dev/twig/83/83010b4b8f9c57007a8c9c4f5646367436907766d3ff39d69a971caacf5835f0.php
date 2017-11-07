<?php

/* WebProfilerBundle:Profiler:ajax_layout.html.twig */
class __TwigTemplate_943a4328cdd144004632f2c9e4935dfa903361c2014566a699f381fc36887d64 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_eb25a7739c52a920dcfaf85e4c78e52d2302080f4ef5f4f8742ac24093dc1472 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_eb25a7739c52a920dcfaf85e4c78e52d2302080f4ef5f4f8742ac24093dc1472->enter($__internal_eb25a7739c52a920dcfaf85e4c78e52d2302080f4ef5f4f8742ac24093dc1472_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:ajax_layout.html.twig"));

        $__internal_5763481e7a4f88481d807f886ca8f83cdc26cbfd2349fa44c0b3cd39520f3179 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5763481e7a4f88481d807f886ca8f83cdc26cbfd2349fa44c0b3cd39520f3179->enter($__internal_5763481e7a4f88481d807f886ca8f83cdc26cbfd2349fa44c0b3cd39520f3179_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:ajax_layout.html.twig"));

        // line 1
        $this->displayBlock('panel', $context, $blocks);
        
        $__internal_eb25a7739c52a920dcfaf85e4c78e52d2302080f4ef5f4f8742ac24093dc1472->leave($__internal_eb25a7739c52a920dcfaf85e4c78e52d2302080f4ef5f4f8742ac24093dc1472_prof);

        
        $__internal_5763481e7a4f88481d807f886ca8f83cdc26cbfd2349fa44c0b3cd39520f3179->leave($__internal_5763481e7a4f88481d807f886ca8f83cdc26cbfd2349fa44c0b3cd39520f3179_prof);

    }

    public function block_panel($context, array $blocks = array())
    {
        $__internal_e1bdf90a57da10818a74d989bcf0d4c8c8d735b01647144982fedb682c34f033 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e1bdf90a57da10818a74d989bcf0d4c8c8d735b01647144982fedb682c34f033->enter($__internal_e1bdf90a57da10818a74d989bcf0d4c8c8d735b01647144982fedb682c34f033_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_46b1aff2fc286c2b442a696e8541909fbcded294837198c001f12de1feb66c74 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_46b1aff2fc286c2b442a696e8541909fbcded294837198c001f12de1feb66c74->enter($__internal_46b1aff2fc286c2b442a696e8541909fbcded294837198c001f12de1feb66c74_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        echo "";
        
        $__internal_46b1aff2fc286c2b442a696e8541909fbcded294837198c001f12de1feb66c74->leave($__internal_46b1aff2fc286c2b442a696e8541909fbcded294837198c001f12de1feb66c74_prof);

        
        $__internal_e1bdf90a57da10818a74d989bcf0d4c8c8d735b01647144982fedb682c34f033->leave($__internal_e1bdf90a57da10818a74d989bcf0d4c8c8d735b01647144982fedb682c34f033_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:ajax_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  26 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block panel '' %}
", "WebProfilerBundle:Profiler:ajax_layout.html.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Profiler/ajax_layout.html.twig");
    }
}
