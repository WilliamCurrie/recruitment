<?php

/* @Framework/Form/integer_widget.html.php */
class __TwigTemplate_9c777bfb410eb372bc7a0eba1257d52780c40934c4d9831b85674366192b55c3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_31da59fc1eed4cc598eb414ad64e76a8eb4629d27b70f65842702fb034ab0884 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_31da59fc1eed4cc598eb414ad64e76a8eb4629d27b70f65842702fb034ab0884->enter($__internal_31da59fc1eed4cc598eb414ad64e76a8eb4629d27b70f65842702fb034ab0884_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/integer_widget.html.php"));

        $__internal_fd6050865f34a7a4f402789ba3d5f0d51ac8a189c31c7d825138644f6506d679 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_fd6050865f34a7a4f402789ba3d5f0d51ac8a189c31c7d825138644f6506d679->enter($__internal_fd6050865f34a7a4f402789ba3d5f0d51ac8a189c31c7d825138644f6506d679_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/integer_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'number')) ?>
";
        
        $__internal_31da59fc1eed4cc598eb414ad64e76a8eb4629d27b70f65842702fb034ab0884->leave($__internal_31da59fc1eed4cc598eb414ad64e76a8eb4629d27b70f65842702fb034ab0884_prof);

        
        $__internal_fd6050865f34a7a4f402789ba3d5f0d51ac8a189c31c7d825138644f6506d679->leave($__internal_fd6050865f34a7a4f402789ba3d5f0d51ac8a189c31c7d825138644f6506d679_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/integer_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'number')) ?>
", "@Framework/Form/integer_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/integer_widget.html.php");
    }
}
