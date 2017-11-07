<?php

/* WebProfilerBundle:Collector:exception.html.twig */
class __TwigTemplate_9686a4200268e8228f08a645977c6ab94f42aa617b6e80356a4d3defaa116264 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "WebProfilerBundle:Collector:exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ed0ea77529bc3d11018562daf200201d6ca6bd6ac96f2b94c488c0ac2245803a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ed0ea77529bc3d11018562daf200201d6ca6bd6ac96f2b94c488c0ac2245803a->enter($__internal_ed0ea77529bc3d11018562daf200201d6ca6bd6ac96f2b94c488c0ac2245803a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Collector:exception.html.twig"));

        $__internal_f84e6053b3f27c04dec89becab2045238536c4b92b4f4f0fd6f18b1e079999c9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f84e6053b3f27c04dec89becab2045238536c4b92b4f4f0fd6f18b1e079999c9->enter($__internal_f84e6053b3f27c04dec89becab2045238536c4b92b4f4f0fd6f18b1e079999c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Collector:exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ed0ea77529bc3d11018562daf200201d6ca6bd6ac96f2b94c488c0ac2245803a->leave($__internal_ed0ea77529bc3d11018562daf200201d6ca6bd6ac96f2b94c488c0ac2245803a_prof);

        
        $__internal_f84e6053b3f27c04dec89becab2045238536c4b92b4f4f0fd6f18b1e079999c9->leave($__internal_f84e6053b3f27c04dec89becab2045238536c4b92b4f4f0fd6f18b1e079999c9_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_19f9884634feb2c7bf45e6a87e2437002ee73c028d7aa31680f7c0a02f7c875c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_19f9884634feb2c7bf45e6a87e2437002ee73c028d7aa31680f7c0a02f7c875c->enter($__internal_19f9884634feb2c7bf45e6a87e2437002ee73c028d7aa31680f7c0a02f7c875c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_99c1ec4a357d34588f62167903544f69982e8c537fc3217bed728a80efed535a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_99c1ec4a357d34588f62167903544f69982e8c537fc3217bed728a80efed535a->enter($__internal_99c1ec4a357d34588f62167903544f69982e8c537fc3217bed728a80efed535a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_99c1ec4a357d34588f62167903544f69982e8c537fc3217bed728a80efed535a->leave($__internal_99c1ec4a357d34588f62167903544f69982e8c537fc3217bed728a80efed535a_prof);

        
        $__internal_19f9884634feb2c7bf45e6a87e2437002ee73c028d7aa31680f7c0a02f7c875c->leave($__internal_19f9884634feb2c7bf45e6a87e2437002ee73c028d7aa31680f7c0a02f7c875c_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_8172983247bf7d7757ed67e54b5e8a4ce10c41df61dd04056a21ffeebd32f8f6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8172983247bf7d7757ed67e54b5e8a4ce10c41df61dd04056a21ffeebd32f8f6->enter($__internal_8172983247bf7d7757ed67e54b5e8a4ce10c41df61dd04056a21ffeebd32f8f6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_19489b3f2bf2d259e8d295efc21e5bab898788179268ed30ec305f86b2bc0b2e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_19489b3f2bf2d259e8d295efc21e5bab898788179268ed30ec305f86b2bc0b2e->enter($__internal_19489b3f2bf2d259e8d295efc21e5bab898788179268ed30ec305f86b2bc0b2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_19489b3f2bf2d259e8d295efc21e5bab898788179268ed30ec305f86b2bc0b2e->leave($__internal_19489b3f2bf2d259e8d295efc21e5bab898788179268ed30ec305f86b2bc0b2e_prof);

        
        $__internal_8172983247bf7d7757ed67e54b5e8a4ce10c41df61dd04056a21ffeebd32f8f6->leave($__internal_8172983247bf7d7757ed67e54b5e8a4ce10c41df61dd04056a21ffeebd32f8f6_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_d390dcdadec9dcb6fa3ae33cd709df4edbc5b73fbe9cfa45d33795a1db09da6d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d390dcdadec9dcb6fa3ae33cd709df4edbc5b73fbe9cfa45d33795a1db09da6d->enter($__internal_d390dcdadec9dcb6fa3ae33cd709df4edbc5b73fbe9cfa45d33795a1db09da6d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_4e6049d91f3bf2c8a1199456330c833e73d0cc3ab1d9c55e780254fef8c097b5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4e6049d91f3bf2c8a1199456330c833e73d0cc3ab1d9c55e780254fef8c097b5->enter($__internal_4e6049d91f3bf2c8a1199456330c833e73d0cc3ab1d9c55e780254fef8c097b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_4e6049d91f3bf2c8a1199456330c833e73d0cc3ab1d9c55e780254fef8c097b5->leave($__internal_4e6049d91f3bf2c8a1199456330c833e73d0cc3ab1d9c55e780254fef8c097b5_prof);

        
        $__internal_d390dcdadec9dcb6fa3ae33cd709df4edbc5b73fbe9cfa45d33795a1db09da6d->leave($__internal_d390dcdadec9dcb6fa3ae33cd709df4edbc5b73fbe9cfa45d33795a1db09da6d_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "WebProfilerBundle:Collector:exception.html.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/exception.html.twig");
    }
}
