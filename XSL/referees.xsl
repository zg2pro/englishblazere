<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
	<h2>
			<xsl:if test="$hl='en'">REFEREES
			</xsl:if>
			<xsl:if test="$hl='fr'">RECOMMENDATIONS</xsl:if>
			</h2>
	<dl>
		<xsl:for-each select="//item">
			<dt>
			<xsl:element name="a">
				<xsl:attribute name="href">mailto:<xsl:value-of select="email"/></xsl:attribute>
				<xsl:value-of select="person"/>
			</xsl:element>
			
			</dt>
			<dd>
			<xsl:value-of disable-output-escaping="yes"  select="title"/>
			</dd>
			<dd>
			<xsl:element name="a">
				<xsl:attribute name="href">../PDF/<xsl:value-of select="letter"/></xsl:attribute>
				Letter (pdf)
			</xsl:element><br/><br/>
			</dd>
		</xsl:for-each>
	</dl>
	</xsl:template>
</xsl:stylesheet>