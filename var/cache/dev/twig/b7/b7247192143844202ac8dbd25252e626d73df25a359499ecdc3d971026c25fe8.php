<?php

/* ::base.html.twig */
class __TwigTemplate_022e5fbe7553c6a016dcf07c24e69cb5d15b6be45fa6378c7d9809f11e8f699d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1753d5a97cf6fa2f9b80cb396ebbe31e26fb22c7409fcf8047c71d434560a64c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1753d5a97cf6fa2f9b80cb396ebbe31e26fb22c7409fcf8047c71d434560a64c->enter($__internal_1753d5a97cf6fa2f9b80cb396ebbe31e26fb22c7409fcf8047c71d434560a64c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        $__internal_840cf28e8fab7120613a06730e90b160b8b2a0d8c834d8fecdbe07f2213f30a4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_840cf28e8fab7120613a06730e90b160b8b2a0d8c834d8fecdbe07f2213f30a4->enter($__internal_840cf28e8fab7120613a06730e90b160b8b2a0d8c834d8fecdbe07f2213f30a4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_1753d5a97cf6fa2f9b80cb396ebbe31e26fb22c7409fcf8047c71d434560a64c->leave($__internal_1753d5a97cf6fa2f9b80cb396ebbe31e26fb22c7409fcf8047c71d434560a64c_prof);

        
        $__internal_840cf28e8fab7120613a06730e90b160b8b2a0d8c834d8fecdbe07f2213f30a4->leave($__internal_840cf28e8fab7120613a06730e90b160b8b2a0d8c834d8fecdbe07f2213f30a4_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_51e96d9b59dbf11d0f59e34af4fa6d14ae487f3fa46389787d715612211eade0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_51e96d9b59dbf11d0f59e34af4fa6d14ae487f3fa46389787d715612211eade0->enter($__internal_51e96d9b59dbf11d0f59e34af4fa6d14ae487f3fa46389787d715612211eade0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_59cf2d1b61ec9e13ef6a87232e2602f912b73db62bed3cfb5c5984d222bab61a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_59cf2d1b61ec9e13ef6a87232e2602f912b73db62bed3cfb5c5984d222bab61a->enter($__internal_59cf2d1b61ec9e13ef6a87232e2602f912b73db62bed3cfb5c5984d222bab61a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_59cf2d1b61ec9e13ef6a87232e2602f912b73db62bed3cfb5c5984d222bab61a->leave($__internal_59cf2d1b61ec9e13ef6a87232e2602f912b73db62bed3cfb5c5984d222bab61a_prof);

        
        $__internal_51e96d9b59dbf11d0f59e34af4fa6d14ae487f3fa46389787d715612211eade0->leave($__internal_51e96d9b59dbf11d0f59e34af4fa6d14ae487f3fa46389787d715612211eade0_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_eaf4e0b1b783ac5e31bdb18826284fe89b72ddc8209e6a46e65027dd0269b5a8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_eaf4e0b1b783ac5e31bdb18826284fe89b72ddc8209e6a46e65027dd0269b5a8->enter($__internal_eaf4e0b1b783ac5e31bdb18826284fe89b72ddc8209e6a46e65027dd0269b5a8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_7286d587caeb3cd40b24779af15ca9c41b7c2ce0bc6c6007cc956e7860595378 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7286d587caeb3cd40b24779af15ca9c41b7c2ce0bc6c6007cc956e7860595378->enter($__internal_7286d587caeb3cd40b24779af15ca9c41b7c2ce0bc6c6007cc956e7860595378_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_7286d587caeb3cd40b24779af15ca9c41b7c2ce0bc6c6007cc956e7860595378->leave($__internal_7286d587caeb3cd40b24779af15ca9c41b7c2ce0bc6c6007cc956e7860595378_prof);

        
        $__internal_eaf4e0b1b783ac5e31bdb18826284fe89b72ddc8209e6a46e65027dd0269b5a8->leave($__internal_eaf4e0b1b783ac5e31bdb18826284fe89b72ddc8209e6a46e65027dd0269b5a8_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_55ecc0932f7fe75eb6e8017642de827aa4d8c98fe111d728957c7618eab6b174 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_55ecc0932f7fe75eb6e8017642de827aa4d8c98fe111d728957c7618eab6b174->enter($__internal_55ecc0932f7fe75eb6e8017642de827aa4d8c98fe111d728957c7618eab6b174_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_6af3689ee4116fd146b7ee99df1063d64628bc5b9cb0fca952f3141f56a45c05 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6af3689ee4116fd146b7ee99df1063d64628bc5b9cb0fca952f3141f56a45c05->enter($__internal_6af3689ee4116fd146b7ee99df1063d64628bc5b9cb0fca952f3141f56a45c05_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6af3689ee4116fd146b7ee99df1063d64628bc5b9cb0fca952f3141f56a45c05->leave($__internal_6af3689ee4116fd146b7ee99df1063d64628bc5b9cb0fca952f3141f56a45c05_prof);

        
        $__internal_55ecc0932f7fe75eb6e8017642de827aa4d8c98fe111d728957c7618eab6b174->leave($__internal_55ecc0932f7fe75eb6e8017642de827aa4d8c98fe111d728957c7618eab6b174_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_cb256a125d2214ea8b638fa6326e78df46b6bc4b66a1662af97241265f2f5fe9 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_cb256a125d2214ea8b638fa6326e78df46b6bc4b66a1662af97241265f2f5fe9->enter($__internal_cb256a125d2214ea8b638fa6326e78df46b6bc4b66a1662af97241265f2f5fe9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_3839e33c087fbd566b86bf3a2bbe0f3a06ab9ce8c2c6535259c8fce69e820bdf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3839e33c087fbd566b86bf3a2bbe0f3a06ab9ce8c2c6535259c8fce69e820bdf->enter($__internal_3839e33c087fbd566b86bf3a2bbe0f3a06ab9ce8c2c6535259c8fce69e820bdf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_3839e33c087fbd566b86bf3a2bbe0f3a06ab9ce8c2c6535259c8fce69e820bdf->leave($__internal_3839e33c087fbd566b86bf3a2bbe0f3a06ab9ce8c2c6535259c8fce69e820bdf_prof);

        
        $__internal_cb256a125d2214ea8b638fa6326e78df46b6bc4b66a1662af97241265f2f5fe9->leave($__internal_cb256a125d2214ea8b638fa6326e78df46b6bc4b66a1662af97241265f2f5fe9_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 11,  100 => 10,  83 => 6,  65 => 5,  53 => 12,  50 => 11,  48 => 10,  41 => 7,  39 => 6,  35 => 5,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "::base.html.twig", "/home/walkyria/Documents/tests/recruitment/app/Resources/views/base.html.twig");
    }
}
